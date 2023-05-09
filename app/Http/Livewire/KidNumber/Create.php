<?php

namespace App\Http\Livewire\KidNumber;

use App\Models\KidNumber;
use Livewire\Component;

class Create extends Component
{
    public KidNumber $kidNumber;

    public function mount(KidNumber $kidNumber)
    {
        $this->kidNumber = $kidNumber;
    }

    public function render()
    {
        return view('livewire.kid-number.create');
    }

    public function submit()
    {
        $this->validate();

        $this->kidNumber->save();

        return redirect()->route('admin.kid-numbers.index');
    }

    protected function rules(): array
    {
        return [
            'kidNumber.name' => [
                'string',
                'required',
            ],
            'kidNumber.number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'kidNumber.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
