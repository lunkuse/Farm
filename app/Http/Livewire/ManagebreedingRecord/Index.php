<?php

namespace App\Http\Livewire\ManagebreedingRecord;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ManagebreedingRecord;
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
        $this->orderable         = (new ManagebreedingRecord())->orderable;
    }

    public function render()
    {
        $query = ManagebreedingRecord::with(['nannyTagNo', 'buckTagNo', 'animalType', 'deliveryNature', 'kidsNumber', 'kidSex', 'breedingComments', 'tag'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $managebreedingRecords = $query->paginate($this->perPage);

        return view('livewire.managebreeding-record.index', compact('managebreedingRecords', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('managebreeding_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ManagebreedingRecord::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ManagebreedingRecord $managebreedingRecord)
    {
        abort_if(Gate::denies('managebreeding_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managebreedingRecord->delete();
    }
}
