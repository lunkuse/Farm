<?php

namespace App\Http\Livewire\GeneralStockRecord;

use App\Models\Breed;
use App\Models\Color;
use App\Models\Gender;
use App\Models\GeneralStockRecord;
use App\Models\Shelter;
use App\Models\Source;
use App\Models\StockType;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public GeneralStockRecord $generalStockRecord;

    public function mount(GeneralStockRecord $generalStockRecord)
    {
        $this->generalStockRecord               = $generalStockRecord;
        $this->generalStockRecord->availability = 'available';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.general-stock-record.create');
    }

    public function submit()
    {
        $this->validate();

        $this->generalStockRecord->save();

        return redirect()->route('admin.general-stock-records.index');
    }

    protected function rules(): array
    {
        return [
            'generalStockRecord.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'generalStockRecord.shelter_id' => [
                'integer',
                'exists:shelters,id',
                'nullable',
            ],
            'generalStockRecord.animal_type_id' => [
                'integer',
                'exists:stock_types,id',
                'nullable',
            ],
            'generalStockRecord.other_animal_type' => [
                'string',
                'nullable',
            ],
            'generalStockRecord.tag_no' => [
                'string',
                'nullable',
            ],
            'generalStockRecord.breed_id' => [
                'integer',
                'exists:breeds,id',
                'nullable',
            ],
            'generalStockRecord.other_breed' => [
                'string',
                'nullable',
            ],
            'generalStockRecord.gender_id' => [
                'integer',
                'exists:genders,id',
                'nullable',
            ],
            'generalStockRecord.dob' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'generalStockRecord.age' => [
                'string',
                'nullable',
            ],
            'generalStockRecord.color_id' => [
                'integer',
                'exists:colors,id',
                'nullable',
            ],
            'generalStockRecord.other_color' => [
                'string',
                'nullable',
            ],
            'generalStockRecord.source_id' => [
                'integer',
                'exists:sources,id',
                'nullable',
            ],
            'generalStockRecord.other_source' => [
                'string',
                'nullable',
            ],
            'generalStockRecord.comments' => [
                'string',
                'nullable',
            ],
            'generalStockRecord.availability' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['availability'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['shelter']      = Shelter::pluck('name', 'id')->toArray();
        $this->listsForFields['animal_type']  = StockType::pluck('title', 'id')->toArray();
        $this->listsForFields['breed']        = Breed::pluck('name', 'id')->toArray();
        $this->listsForFields['gender']       = Gender::pluck('name', 'id')->toArray();
        $this->listsForFields['color']        = Color::pluck('name', 'id')->toArray();
        $this->listsForFields['source']       = Source::pluck('name', 'id')->toArray();
        $this->listsForFields['availability'] = $this->generalStockRecord::AVAILABILITY_SELECT;
    }
}
