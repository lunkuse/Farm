<?php

namespace App\Http\Livewire\CurrentDiagnosi;

use App\Models\CurrentDiagnosi;
use Livewire\Component;

class Edit extends Component
{
    public CurrentDiagnosi $currentDiagnosi;

    public function mount(CurrentDiagnosi $currentDiagnosi)
    {
        $this->currentDiagnosi = $currentDiagnosi;
    }

    public function render()
    {
        return view('livewire.current-diagnosi.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->currentDiagnosi->save();

        return redirect()->route('admin.current-diagnosis.index');
    }

    protected function rules(): array
    {
        return [
            'currentDiagnosi.name' => [
                'string',
                'required',
            ],
            'currentDiagnosi.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
