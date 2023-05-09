<?php

namespace App\Http\Livewire\TreatmentAdministered;

use App\Models\TreatmentAdministered;
use Livewire\Component;

class Create extends Component
{
    public TreatmentAdministered $treatmentAdministered;

    public function mount(TreatmentAdministered $treatmentAdministered)
    {
        $this->treatmentAdministered = $treatmentAdministered;
    }

    public function render()
    {
        return view('livewire.treatment-administered.create');
    }

    public function submit()
    {
        $this->validate();

        $this->treatmentAdministered->save();

        return redirect()->route('admin.treatment-administereds.index');
    }

    protected function rules(): array
    {
        return [
            'treatmentAdministered.name' => [
                'string',
                'required',
            ],
            'treatmentAdministered.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
