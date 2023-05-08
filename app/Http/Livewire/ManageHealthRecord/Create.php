<?php

namespace App\Http\Livewire\ManageHealthRecord;

use App\Models\ClinicalHistory;
use App\Models\CurrentDiagnosi;
use App\Models\GeneralStockRecord;
use App\Models\ManageHealthRecord;
use App\Models\TreatmentAdministered;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public array $clinical_history = [];

    public array $current_diagnosis = [];

    public array $treatment_administered = [];

    public ManageHealthRecord $manageHealthRecord;

    public function mount(ManageHealthRecord $manageHealthRecord)
    {
        $this->manageHealthRecord = $manageHealthRecord;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.manage-health-record.create');
    }

    public function submit()
    {
        $this->validate();

        $this->manageHealthRecord->save();
        $this->manageHealthRecord->clinicalHistory()->sync($this->clinical_history);
        $this->manageHealthRecord->currentDiagnosis()->sync($this->current_diagnosis);
        $this->manageHealthRecord->treatmentAdministered()->sync($this->treatment_administered);

        return redirect()->route('admin.manage-health-records.index');
    }

    protected function rules(): array
    {
        return [
            'manageHealthRecord.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'manageHealthRecord.tag_no_id' => [
                'integer',
                'exists:general_stock_records,id',
                'required',
            ],
            'clinical_history' => [
                'array',
            ],
            'clinical_history.*.id' => [
                'integer',
                'exists:clinical_histories,id',
            ],
            'manageHealthRecord.other_clinical_history' => [
                'string',
                'nullable',
            ],
            'current_diagnosis' => [
                'array',
            ],
            'current_diagnosis.*.id' => [
                'integer',
                'exists:current_diagnosis,id',
            ],
            'manageHealthRecord.other_current_diagnosis' => [
                'string',
                'nullable',
            ],
            'treatment_administered' => [
                'array',
            ],
            'treatment_administered.*.id' => [
                'integer',
                'exists:treatment_administereds,id',
            ],
            'manageHealthRecord.other_treatment_administered' => [
                'string',
                'nullable',
            ],
            'manageHealthRecord.attending_officer' => [
                'string',
                'nullable',
            ],
            'manageHealthRecord.comments' => [
                'string',
                'nullable',
            ],
            'manageHealthRecord.stock_attendant_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['tag_no']                 = GeneralStockRecord::pluck('tag_no', 'id')->toArray();
        $this->listsForFields['clinical_history']       = ClinicalHistory::pluck('name', 'id')->toArray();
        $this->listsForFields['current_diagnosis']      = CurrentDiagnosi::pluck('name', 'id')->toArray();
        $this->listsForFields['treatment_administered'] = TreatmentAdministered::pluck('name', 'id')->toArray();
        $this->listsForFields['stock_attendant']        = User::pluck('name', 'id')->toArray();
    }
}
