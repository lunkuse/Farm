<?php

namespace App\Http\Livewire\Harvestor;

use App\Models\Harvestor;
use Livewire\Component;

class Create extends Component
{
    public Harvestor $harvestor;

    public function mount(Harvestor $harvestor)
    {
        $this->harvestor = $harvestor;
    }

    public function render()
    {
        return view('livewire.harvestor.create');
    }

    public function submit()
    {
        $this->validate();

        $this->harvestor->save();

        return redirect()->route('admin.harvestors.index');
    }

    protected function rules(): array
    {
        return [
            'harvestor.title' => [
                'string',
                'required',
            ],
            'harvestor.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
