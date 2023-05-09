<?php

namespace App\Http\Livewire\Block;

use App\Models\Block;
use Livewire\Component;

class Edit extends Component
{
    public Block $block;

    public function mount(Block $block)
    {
        $this->block = $block;
    }

    public function render()
    {
        return view('livewire.block.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->block->save();

        return redirect()->route('admin.blocks.index');
    }

    protected function rules(): array
    {
        return [
            'block.title' => [
                'string',
                'required',
            ],
            'block.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
