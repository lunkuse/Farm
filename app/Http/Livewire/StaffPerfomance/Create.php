<?php

namespace App\Http\Livewire\StaffPerfomance;

use App\Models\StaffPerfomance;
use Livewire\Component;

class Create extends Component
{
    public StaffPerfomance $staffPerfomance;

    public function mount(StaffPerfomance $staffPerfomance)
    {
        $this->staffPerfomance = $staffPerfomance;
    }

    public function render()
    {
        return view('livewire.staff-perfomance.create');
    }

    public function submit()
    {
        $this->validate();

        $this->staffPerfomance->save();

        return redirect()->route('admin.staff-perfomances.index');
    }

    protected function rules(): array
    {
        return [
            'staffPerfomance.name' => [
                'string',
                'required',
            ],
            'staffPerfomance.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
