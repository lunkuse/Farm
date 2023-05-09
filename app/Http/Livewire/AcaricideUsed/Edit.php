<?php

namespace App\Http\Livewire\AcaricideUsed;

use App\Models\AcaricideUsed;
use Livewire\Component;

class Edit extends Component
{
    public AcaricideUsed $acaricideUsed;

    public function mount(AcaricideUsed $acaricideUsed)
    {
        $this->acaricideUsed = $acaricideUsed;
    }

    public function render()
    {
        return view('livewire.acaricide-used.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->acaricideUsed->save();

        return redirect()->route('admin.acaricide-useds.index');
    }

    protected function rules(): array
    {
        return [
            'acaricideUsed.name' => [
                'string',
                'required',
            ],
            'acaricideUsed.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
