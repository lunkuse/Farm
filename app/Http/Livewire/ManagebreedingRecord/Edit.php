<?php

namespace App\Http\Livewire\ManagebreedingRecord;

use App\Models\BreedingComment;
use App\Models\DeliveryNature;
use App\Models\Gender;
use App\Models\GeneralStockRecord;
use App\Models\KidNumber;
use App\Models\ManagebreedingRecord;
use App\Models\StockType;
use Livewire\Component;

class Edit extends Component
{
    public array $tag = [];

    public array $kid_sex = [];

    public array $listsForFields = [];

    public array $breeding_comments = [];

    public ManagebreedingRecord $managebreedingRecord;

    public function mount(ManagebreedingRecord $managebreedingRecord)
    {
        $this->managebreedingRecord = $managebreedingRecord;
        $this->kid_sex              = $this->managebreedingRecord->kidSex()->pluck('id')->toArray();
        $this->breeding_comments    = $this->managebreedingRecord->breedingComments()->pluck('id')->toArray();
        $this->tag                  = $this->managebreedingRecord->tag()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.managebreeding-record.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->managebreedingRecord->save();
        $this->managebreedingRecord->kidSex()->sync($this->kid_sex);
        $this->managebreedingRecord->breedingComments()->sync($this->breeding_comments);
        $this->managebreedingRecord->tag()->sync($this->tag);

        return redirect()->route('admin.managebreeding-records.index');
    }

    protected function rules(): array
    {
        return [
            'managebreedingRecord.nanny_tag_no_id' => [
                'integer',
                'exists:general_stock_records,id',
                'nullable',
            ],
            'managebreedingRecord.buck_tag_no_id' => [
                'integer',
                'exists:general_stock_records,id',
                'nullable',
            ],
            'managebreedingRecord.date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'managebreedingRecord.animal_type_id' => [
                'integer',
                'exists:stock_types,id',
                'nullable',
            ],
            'managebreedingRecord.delivery_nature_id' => [
                'integer',
                'exists:delivery_natures,id',
                'nullable',
            ],
            'managebreedingRecord.kids_number_id' => [
                'integer',
                'exists:kid_numbers,id',
                'nullable',
            ],
            'kid_sex' => [
                'array',
            ],
            'kid_sex.*.id' => [
                'integer',
                'exists:genders,id',
            ],
            'breeding_comments' => [
                'array',
            ],
            'breeding_comments.*.id' => [
                'integer',
                'exists:breeding_comments,id',
            ],
            'tag' => [
                'array',
            ],
            'tag.*.id' => [
                'integer',
                'exists:general_stock_records,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['nanny_tag_no']      = GeneralStockRecord::pluck('tag_no', 'id')->toArray();
        $this->listsForFields['buck_tag_no']       = GeneralStockRecord::pluck('tag_no', 'id')->toArray();
        $this->listsForFields['animal_type']       = StockType::pluck('title', 'id')->toArray();
        $this->listsForFields['delivery_nature']   = DeliveryNature::pluck('name', 'id')->toArray();
        $this->listsForFields['kids_number']       = KidNumber::pluck('name', 'id')->toArray();
        $this->listsForFields['kid_sex']           = Gender::pluck('name', 'id')->toArray();
        $this->listsForFields['breeding_comments'] = BreedingComment::pluck('comment', 'id')->toArray();
        $this->listsForFields['tag']               = GeneralStockRecord::pluck('tag_no', 'id')->toArray();
    }
}
