<?php

namespace App\Http\Livewire\ManageEctoParasite;

use App\Models\AcaricideUsed;
use App\Models\Block;
use App\Models\ManageEctoParasite;
use Livewire\Component;

class Create extends Component
{
    public array $block = [];

    public array $listsForFields = [];

    public array $acaricide_used = [];

    public ManageEctoParasite $manageEctoParasite;

    public function mount(ManageEctoParasite $manageEctoParasite)
    {
        $this->manageEctoParasite = $manageEctoParasite;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.manage-ecto-parasite.create');
    }

    public function submit()
    {
        $this->validate();

        $this->manageEctoParasite->save();
        $this->manageEctoParasite->block()->sync($this->block);
        $this->manageEctoParasite->acaricideUsed()->sync($this->acaricide_used);

        return redirect()->route('admin.manage-ecto-parasites.index');
    }

    protected function rules(): array
    {
        return [
            'block' => [
                'array',
            ],
            'block.*.id' => [
                'integer',
                'exists:blocks,id',
            ],
            'manageEctoParasite.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'acaricide_used' => [
                'array',
            ],
            'acaricide_used.*.id' => [
                'integer',
                'exists:acaricide_useds,id',
            ],
            'manageEctoParasite.other_acaricide' => [
                'string',
                'nullable',
            ],
            'manageEctoParasite.time_of_spray' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'manageEctoParasite.next_spray_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'manageEctoParasite.comments' => [
                'string',
                'nullable',
            ],
            'manageEctoParasite.attending_officer' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['block']          = Block::pluck('title', 'id')->toArray();
        $this->listsForFields['acaricide_used'] = AcaricideUsed::pluck('name', 'id')->toArray();
    }
}
