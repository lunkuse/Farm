<?php

namespace App\Http\Livewire\BreedingComment;

use App\Models\BreedingComment;
use Livewire\Component;

class Create extends Component
{
    public BreedingComment $breedingComment;

    public function mount(BreedingComment $breedingComment)
    {
        $this->breedingComment = $breedingComment;
    }

    public function render()
    {
        return view('livewire.breeding-comment.create');
    }

    public function submit()
    {
        $this->validate();

        $this->breedingComment->save();

        return redirect()->route('admin.breeding-comments.index');
    }

    protected function rules(): array
    {
        return [
            'breedingComment.comment' => [
                'string',
                'required',
            ],
        ];
    }
}
