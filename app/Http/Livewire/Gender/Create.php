<?php

namespace App\Http\Livewire\Gender;

use App\Models\Gender;
use Livewire\Component;

class Create extends Component
{
    public Gender $gender;

    public function mount(Gender $gender)
    {
        $this->gender = $gender;
    }

    public function render()
    {
        return view('livewire.gender.create');
    }

    public function submit()
    {
        $this->validate();

        $this->gender->save();

        return redirect()->route('admin.genders.index');
    }

    protected function rules(): array
    {
        return [
            'gender.name' => [
                'string',
                'min:2',
                'max:1000',
                'required',
            ],
            'gender.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
