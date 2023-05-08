<?php

namespace App\Http\Livewire\ExpenditureType;

use App\Models\ExpenditureType;
use Livewire\Component;

class Edit extends Component
{
    public ExpenditureType $expenditureType;

    public function mount(ExpenditureType $expenditureType)
    {
        $this->expenditureType = $expenditureType;
    }

    public function render()
    {
        return view('livewire.expenditure-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->expenditureType->save();

        return redirect()->route('admin.expenditure-types.index');
    }

    protected function rules(): array
    {
        return [
            'expenditureType.type' => [
                'string',
                'required',
            ],
            'expenditureType.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
