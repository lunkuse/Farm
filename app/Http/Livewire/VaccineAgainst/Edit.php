<?php

namespace App\Http\Livewire\VaccineAgainst;

use App\Models\VaccineAgainst;
use Livewire\Component;

class Edit extends Component
{
    public VaccineAgainst $vaccineAgainst;

    public function mount(VaccineAgainst $vaccineAgainst)
    {
        $this->vaccineAgainst = $vaccineAgainst;
    }

    public function render()
    {
        return view('livewire.vaccine-against.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->vaccineAgainst->save();

        return redirect()->route('admin.vaccine-againsts.index');
    }

    protected function rules(): array
    {
        return [
            'vaccineAgainst.name' => [
                'string',
                'required',
            ],
            'vaccineAgainst.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
