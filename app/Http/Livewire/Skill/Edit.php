<?php

namespace App\Http\Livewire\Skill;

use App\Models\Skill;
use Livewire\Component;

class Edit extends Component
{
    public Skill $skill;

    public function mount(Skill $skill)
    {
        $this->skill = $skill;
    }

    public function render()
    {
        return view('livewire.skill.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->skill->save();

        return redirect()->route('admin.skills.index');
    }

    protected function rules(): array
    {
        return [
            'skill.title' => [
                'string',
                'required',
            ],
            'skill.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
