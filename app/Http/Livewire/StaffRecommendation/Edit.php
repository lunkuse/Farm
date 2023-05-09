<?php

namespace App\Http\Livewire\StaffRecommendation;

use App\Models\StaffRecommendation;
use Livewire\Component;

class Edit extends Component
{
    public StaffRecommendation $staffRecommendation;

    public function mount(StaffRecommendation $staffRecommendation)
    {
        $this->staffRecommendation = $staffRecommendation;
    }

    public function render()
    {
        return view('livewire.staff-recommendation.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->staffRecommendation->save();

        return redirect()->route('admin.staff-recommendations.index');
    }

    protected function rules(): array
    {
        return [
            'staffRecommendation.name' => [
                'string',
                'required',
            ],
            'staffRecommendation.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
