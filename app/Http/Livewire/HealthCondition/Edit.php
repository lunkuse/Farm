<?php

namespace App\Http\Livewire\HealthCondition;

use App\Models\HealthCondition;
use Livewire\Component;

class Edit extends Component
{
    public HealthCondition $healthCondition;

    public function mount(HealthCondition $healthCondition)
    {
        $this->healthCondition = $healthCondition;
    }

    public function render()
    {
        return view('livewire.health-condition.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->healthCondition->save();

        return redirect()->route('admin.health-conditions.index');
    }

    protected function rules(): array
    {
        return [
            'healthCondition.title' => [
                'string',
                'required',
            ],
            'healthCondition.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
