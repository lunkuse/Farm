<?php

namespace App\Http\Livewire\Harvestcomment;

use App\Models\Harvestcomment;
use Livewire\Component;

class Create extends Component
{
    public Harvestcomment $harvestcomment;

    public function mount(Harvestcomment $harvestcomment)
    {
        $this->harvestcomment = $harvestcomment;
    }

    public function render()
    {
        return view('livewire.harvestcomment.create');
    }

    public function submit()
    {
        $this->validate();

        $this->harvestcomment->save();

        return redirect()->route('admin.harvestcomments.index');
    }

    protected function rules(): array
    {
        return [
            'harvestcomment.title' => [
                'string',
                'required',
            ],
        ];
    }
}
