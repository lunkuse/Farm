<?php

namespace App\Http\Livewire\ManageHealthRecord;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ManageHealthRecord;
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
        $this->orderable         = (new ManageHealthRecord())->orderable;
    }

    public function render()
    {
        $query = ManageHealthRecord::with(['tagNo', 'clinicalHistory', 'currentDiagnosis', 'treatmentAdministered', 'stockAttendant'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $manageHealthRecords = $query->paginate($this->perPage);

        return view('livewire.manage-health-record.index', compact('manageHealthRecords', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('manage_health_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ManageHealthRecord::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ManageHealthRecord $manageHealthRecord)
    {
        abort_if(Gate::denies('manage_health_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageHealthRecord->delete();
    }
}
