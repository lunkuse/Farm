<?php

namespace App\Http\Livewire\OrchardRecord;

use App\Models\FruitType;
use App\Models\Harvestcomment;
use App\Models\Harvestor;
use App\Models\OrchardRecord;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $comments = [];

    public array $harvestors = [];

    public array $listsForFields = [];

    public OrchardRecord $orchardRecord;

    public function mount(OrchardRecord $orchardRecord)
    {
        $this->orchardRecord = $orchardRecord;
        $this->harvestors    = $this->orchardRecord->harvestors()->pluck('id')->toArray();
        $this->comments      = $this->orchardRecord->comments()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.orchard-record.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->orchardRecord->save();
        $this->orchardRecord->harvestors()->sync($this->harvestors);
        $this->orchardRecord->comments()->sync($this->comments);

        return redirect()->route('admin.orchard-records.index');
    }

    protected function rules(): array
    {
        return [
            'orchardRecord.date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'orchardRecord.fruit_type_id' => [
                'integer',
                'exists:fruit_types,id',
                'nullable',
            ],
            'orchardRecord.fruits_harvested' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'orchardRecord.fruits_cleaned' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'orchardRecord.fruits_sorted_out' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'orchardRecord.fruits_eaten' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'harvestors' => [
                'array',
            ],
            'harvestors.*.id' => [
                'integer',
                'exists:harvestors,id',
            ],
            'comments' => [
                'array',
            ],
            'comments.*.id' => [
                'integer',
                'exists:harvestcomments,id',
            ],
            'orchardRecord.recording_officer_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['fruit_type']        = FruitType::pluck('name', 'id')->toArray();
        $this->listsForFields['harvestors']        = Harvestor::pluck('title', 'id')->toArray();
        $this->listsForFields['comments']          = Harvestcomment::pluck('title', 'id')->toArray();
        $this->listsForFields['recording_officer'] = User::pluck('name', 'id')->toArray();
    }
}
