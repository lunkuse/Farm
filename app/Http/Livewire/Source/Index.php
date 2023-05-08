<?php

namespace App\Http\Livewire\Source;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Source;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 10;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Source())->orderable;
    }

    public function render()
    {
        $query = Source::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $sources = $query->paginate($this->perPage);

        return view('livewire.source.index', compact('query', 'sources'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Source::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Source $source)
    {
        abort_if(Gate::denies('source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $source->delete();
    }
}
