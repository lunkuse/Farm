<?php

namespace App\Http\Livewire\ClinicalHistory;

use App\Models\ClinicalHistory;
use Livewire\Component;

class Edit extends Component
{
    public ClinicalHistory $clinicalHistory;

    public function mount(ClinicalHistory $clinicalHistory)
    {
        $this->clinicalHistory = $clinicalHistory;
    }

    public function render()
    {
        return view('livewire.clinical-history.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->clinicalHistory->save();

        return redirect()->route('admin.clinical-histories.index');
    }

    protected function rules(): array
    {
        return [
            'clinicalHistory.name' => [
                'string',
                'required',
            ],
            'clinicalHistory.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
