<?php

namespace App\Http\Livewire\FruitType;

use App\Models\FruitType;
use Livewire\Component;

class Create extends Component
{
    public FruitType $fruitType;

    public function mount(FruitType $fruitType)
    {
        $this->fruitType = $fruitType;
    }

    public function render()
    {
        return view('livewire.fruit-type.create');
    }

    public function submit()
    {
        $this->validate();

        $this->fruitType->save();

        return redirect()->route('admin.fruit-types.index');
    }

    protected function rules(): array
    {
        return [
            'fruitType.name' => [
                'string',
                'required',
            ],
            'fruitType.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
