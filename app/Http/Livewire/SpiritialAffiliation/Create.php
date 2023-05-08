<?php

namespace App\Http\Livewire\SpiritialAffiliation;

use App\Models\SpiritialAffiliation;
use Livewire\Component;

class Create extends Component
{
    public SpiritialAffiliation $spiritialAffiliation;

    public function mount(SpiritialAffiliation $spiritialAffiliation)
    {
        $this->spiritialAffiliation = $spiritialAffiliation;
    }

    public function render()
    {
        return view('livewire.spiritial-affiliation.create');
    }

    public function submit()
    {
        $this->validate();

        $this->spiritialAffiliation->save();

        return redirect()->route('admin.spiritial-affiliations.index');
    }

    protected function rules(): array
    {
        return [
            'spiritialAffiliation.title' => [
                'string',
                'required',
            ],
            'spiritialAffiliation.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
