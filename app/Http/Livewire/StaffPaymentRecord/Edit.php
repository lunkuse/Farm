<?php

namespace App\Http\Livewire\StaffPaymentRecord;

use App\Models\StaffPaymentRecord;
use Livewire\Component;

class Edit extends Component
{
    public StaffPaymentRecord $staffPaymentRecord;

    public function mount(StaffPaymentRecord $staffPaymentRecord)
    {
        $this->staffPaymentRecord = $staffPaymentRecord;
    }

    public function render()
    {
        return view('livewire.staff-payment-record.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->staffPaymentRecord->save();

        return redirect()->route('admin.staff-payment-records.index');
    }

    protected function rules(): array
    {
        return [
            'staffPaymentRecord.name' => [
                'string',
                'required',
            ],
            'staffPaymentRecord.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
