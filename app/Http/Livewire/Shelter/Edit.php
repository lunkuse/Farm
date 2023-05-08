<?php

namespace App\Http\Livewire\Shelter;

use App\Models\Block;
use App\Models\Shelter;
use Livewire\Component;

class Edit extends Component
{
    public Shelter $shelter;

    public array $listsForFields = [];

    public function mount(Shelter $shelter)
    {
        $this->shelter = $shelter;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.shelter.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->shelter->save();

        return redirect()->route('admin.shelters.index');
    }

    protected function rules(): array
    {
        return [
            'shelter.block_id' => [
                'integer',
                'exists:blocks,id',
                'nullable',
            ],
            'shelter.name' => [
                'string',
                'required',
            ],
            'shelter.description' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['block'] = Block::pluck('title', 'id')->toArray();
    }
}
