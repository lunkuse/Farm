<?php

namespace App\Http\Livewire\GeneralStockRecord;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\GeneralStockRecord;
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
        $this->orderable         = (new GeneralStockRecord())->orderable;
    }

    public function render()
    {
        $query = GeneralStockRecord::with(['shelter', 'animalType', 'breed', 'gender', 'color', 'source'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $generalStockRecords = $query->paginate($this->perPage);

        return view('livewire.general-stock-record.index', compact('generalStockRecords', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('general_stock_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        GeneralStockRecord::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(GeneralStockRecord $generalStockRecord)
    {
        abort_if(Gate::denies('general_stock_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalStockRecord->delete();
    }
}
