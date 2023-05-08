<?php

namespace App\Http\Livewire\ManageSaleRecord;

use App\Models\GeneralStockRecord;
use App\Models\ManageSaleRecord;
use App\Models\SalePurpose;
use Livewire\Component;

class Create extends Component
{
    public array $animal_tag = [];

    public array $sale_purpose = [];

    public array $listsForFields = [];

    public ManageSaleRecord $manageSaleRecord;

    public function mount(ManageSaleRecord $manageSaleRecord)
    {
        $this->manageSaleRecord = $manageSaleRecord;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.manage-sale-record.create');
    }

    public function submit()
    {
        $this->validate();

        $this->manageSaleRecord->save();
        $this->manageSaleRecord->animalTag()->sync($this->animal_tag);
        $this->manageSaleRecord->salePurpose()->sync($this->sale_purpose);

        return redirect()->route('admin.manage-sale-records.index');
    }

    protected function rules(): array
    {
        return [
            'manageSaleRecord.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'animal_tag' => [
                'required',
                'array',
            ],
            'animal_tag.*.id' => [
                'integer',
                'exists:general_stock_records,id',
            ],
            'manageSaleRecord.quantity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'manageSaleRecord.amount' => [
                'numeric',
                'required',
            ],
            'sale_purpose' => [
                'array',
            ],
            'sale_purpose.*.id' => [
                'integer',
                'exists:sale_purposes,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['animal_tag']   = GeneralStockRecord::pluck('tag_no', 'id')->toArray();
        $this->listsForFields['sale_purpose'] = SalePurpose::pluck('purpose', 'id')->toArray();
    }
}
