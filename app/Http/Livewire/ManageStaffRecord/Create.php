<?php

namespace App\Http\Livewire\ManageStaffRecord;

use App\Models\ManageStaffRecord;
use App\Models\Role;
use App\Models\StaffPaymentRecord;
use App\Models\StaffPerfomance;
use App\Models\StaffRecommendation;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $role = [];

    public array $listsForFields = [];

    public array $recommendation = [];

    public ManageStaffRecord $manageStaffRecord;

    public function mount(ManageStaffRecord $manageStaffRecord)
    {
        $this->manageStaffRecord = $manageStaffRecord;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.manage-staff-record.create');
    }

    public function submit()
    {
        $this->validate();

        $this->manageStaffRecord->save();
        $this->manageStaffRecord->role()->sync($this->role);
        $this->manageStaffRecord->recommendation()->sync($this->recommendation);

        return redirect()->route('admin.manage-staff-records.index');
    }

    protected function rules(): array
    {
        return [
            'manageStaffRecord.staff_name_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'role' => [
                'array',
            ],
            'role.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'manageStaffRecord.wage' => [
                'numeric',
                'required',
            ],
            'manageStaffRecord.payment_record_id' => [
                'integer',
                'exists:staff_payment_records,id',
                'required',
            ],
            'manageStaffRecord.month_year' => [
                'string',
                'nullable',
            ],
            'manageStaffRecord.staff_perfomance_id' => [
                'integer',
                'exists:staff_perfomances,id',
                'required',
            ],
            'recommendation' => [
                'array',
            ],
            'recommendation.*.id' => [
                'integer',
                'exists:staff_recommendations,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['staff_name']       = User::pluck('name', 'id')->toArray();
        $this->listsForFields['role']             = Role::pluck('title', 'id')->toArray();
        $this->listsForFields['payment_record']   = StaffPaymentRecord::pluck('name', 'id')->toArray();
        $this->listsForFields['staff_perfomance'] = StaffPerfomance::pluck('name', 'id')->toArray();
        $this->listsForFields['recommendation']   = StaffRecommendation::pluck('name', 'id')->toArray();
    }
}
