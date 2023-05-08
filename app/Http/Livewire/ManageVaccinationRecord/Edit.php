<?php

namespace App\Http\Livewire\ManageVaccinationRecord;

use App\Models\CategoryOfAnimalsVaccinated;
use App\Models\ManageVaccinationRecord;
use App\Models\Shelter;
use App\Models\VaccineAgainst;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public array $vaccine_against = [];

    public array $category_of_animals_vaccinated = [];

    public ManageVaccinationRecord $manageVaccinationRecord;

    public function mount(ManageVaccinationRecord $manageVaccinationRecord)
    {
        $this->manageVaccinationRecord        = $manageVaccinationRecord;
        $this->vaccine_against                = $this->manageVaccinationRecord->vaccineAgainst()->pluck('id')->toArray();
        $this->category_of_animals_vaccinated = $this->manageVaccinationRecord->categoryOfAnimalsVaccinated()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.manage-vaccination-record.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->manageVaccinationRecord->save();
        $this->manageVaccinationRecord->vaccineAgainst()->sync($this->vaccine_against);
        $this->manageVaccinationRecord->categoryOfAnimalsVaccinated()->sync($this->category_of_animals_vaccinated);

        return redirect()->route('admin.manage-vaccination-records.index');
    }

    protected function rules(): array
    {
        return [
            'manageVaccinationRecord.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'manageVaccinationRecord.shelter_id' => [
                'integer',
                'exists:shelters,id',
                'nullable',
            ],
            'vaccine_against' => [
                'array',
            ],
            'vaccine_against.*.id' => [
                'integer',
                'exists:vaccine_againsts,id',
            ],
            'manageVaccinationRecord.other_vaccination_against' => [
                'string',
                'nullable',
            ],
            'category_of_animals_vaccinated' => [
                'array',
            ],
            'category_of_animals_vaccinated.*.id' => [
                'integer',
                'exists:category_of_animals_vaccinateds,id',
            ],
            'manageVaccinationRecord.other_category' => [
                'string',
                'nullable',
            ],
            'manageVaccinationRecord.next_vac_date_month_yea_r' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'manageVaccinationRecord.attending_officer' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['shelter']                        = Shelter::pluck('name', 'id')->toArray();
        $this->listsForFields['vaccine_against']                = VaccineAgainst::pluck('name', 'id')->toArray();
        $this->listsForFields['category_of_animals_vaccinated'] = CategoryOfAnimalsVaccinated::pluck('name', 'id')->toArray();
    }
}
