<?php

namespace App\Http\Livewire\Breed;

use App\Models\Breed;
use Livewire\Component;

class Edit extends Component
{
    public Breed $breed;

    public function mount(Breed $breed)
    {
        $this->breed = $breed;
    }

    public function render()
    {
        return view('livewire.breed.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->breed->save();

        return redirect()->route('admin.breeds.index');
    }

    protected function rules(): array
    {
        return [
            'breed.name' => [
                'string',
                'min:2',
                'max:1000',
                'required',
            ],
            'breed.description' => [
                'string',
                'min:2',
                'nullable',
            ],
        ];
    }
}
