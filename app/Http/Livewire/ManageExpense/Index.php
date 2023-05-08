<?php

namespace App\Http\Livewire\ManageExpense;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ManageExpense;
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
        $this->orderable         = (new ManageExpense())->orderable;
    }

    public function render()
    {
        $query = ManageExpense::with(['expenditureType', 'attendant'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $manageExpenses = $query->paginate($this->perPage);

        return view('livewire.manage-expense.index', compact('manageExpenses', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('manage_expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ManageExpense::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ManageExpense $manageExpense)
    {
        abort_if(Gate::denies('manage_expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageExpense->delete();
    }
}
