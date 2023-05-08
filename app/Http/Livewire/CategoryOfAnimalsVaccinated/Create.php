<?php

namespace App\Http\Livewire\CategoryOfAnimalsVaccinated;

use App\Models\CategoryOfAnimalsVaccinated;
use Livewire\Component;

class Create extends Component
{
    public CategoryOfAnimalsVaccinated $categoryOfAnimalsVaccinated;

    public function mount(CategoryOfAnimalsVaccinated $categoryOfAnimalsVaccinated)
    {
        $this->categoryOfAnimalsVaccinated = $categoryOfAnimalsVaccinated;
    }

    public function render()
    {
        return view('livewire.category-of-animals-vaccinated.create');
    }

    public function submit()
    {
        $this->validate();

        $this->categoryOfAnimalsVaccinated->save();

        return redirect()->route('admin.category-of-animals-vaccinateds.index');
    }

    protected function rules(): array
    {
        return [
            'categoryOfAnimalsVaccinated.name' => [
                'string',
                'required',
            ],
            'categoryOfAnimalsVaccinated.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
