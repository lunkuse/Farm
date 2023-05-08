<?php

namespace App\Http\Livewire\ManageExpense;

use App\Models\ExpenditureType;
use App\Models\ManageExpense;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public ManageExpense $manageExpense;

    public function mount(ManageExpense $manageExpense)
    {
        $this->manageExpense = $manageExpense;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.manage-expense.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->manageExpense->save();

        return redirect()->route('admin.manage-expenses.index');
    }

    protected function rules(): array
    {
        return [
            'manageExpense.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'manageExpense.expenditure_type_id' => [
                'integer',
                'exists:expenditure_types,id',
                'nullable',
            ],
            'manageExpense.quantity' => [
                'string',
                'nullable',
            ],
            'manageExpense.amount' => [
                'numeric',
                'required',
            ],
            'manageExpense.comments' => [
                'string',
                'nullable',
            ],
            'manageExpense.attendant_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['expenditure_type'] = ExpenditureType::pluck('type', 'id')->toArray();
        $this->listsForFields['attendant']        = User::pluck('name', 'id')->toArray();
    }
}
