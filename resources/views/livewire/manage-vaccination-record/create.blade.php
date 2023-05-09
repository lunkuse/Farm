<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('manageVaccinationRecord.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.manageVaccinationRecord.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="manageVaccinationRecord.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('manageVaccinationRecord.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageVaccinationRecord.shelter_id') ? 'invalid' : '' }}">
        <label class="form-label" for="shelter">{{ trans('cruds.manageVaccinationRecord.fields.shelter') }}</label>
        <x-select-list class="form-control" id="shelter" name="shelter" :options="$this->listsForFields['shelter']" wire:model="manageVaccinationRecord.shelter_id" />
        <div class="validation-message">
            {{ $errors->first('manageVaccinationRecord.shelter_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.shelter_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vaccine_against') ? 'invalid' : '' }}">
        <label class="form-label" for="vaccine_against">{{ trans('cruds.manageVaccinationRecord.fields.vaccine_against') }}</label>
        <x-select-list class="form-control" id="vaccine_against" name="vaccine_against" wire:model="vaccine_against" :options="$this->listsForFields['vaccine_against']" multiple />
        <div class="validation-message">
            {{ $errors->first('vaccine_against') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.vaccine_against_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageVaccinationRecord.other_vaccination_against') ? 'invalid' : '' }}">
        <label class="form-label" for="other_vaccination_against">{{ trans('cruds.manageVaccinationRecord.fields.other_vaccination_against') }}</label>
        <input class="form-control" type="text" name="other_vaccination_against" id="other_vaccination_against" wire:model.defer="manageVaccinationRecord.other_vaccination_against">
        <div class="validation-message">
            {{ $errors->first('manageVaccinationRecord.other_vaccination_against') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.other_vaccination_against_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category_of_animals_vaccinated') ? 'invalid' : '' }}">
        <label class="form-label" for="category_of_animals_vaccinated">{{ trans('cruds.manageVaccinationRecord.fields.category_of_animals_vaccinated') }}</label>
        <x-select-list class="form-control" id="category_of_animals_vaccinated" name="category_of_animals_vaccinated" wire:model="category_of_animals_vaccinated" :options="$this->listsForFields['category_of_animals_vaccinated']" multiple />
        <div class="validation-message">
            {{ $errors->first('category_of_animals_vaccinated') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.category_of_animals_vaccinated_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageVaccinationRecord.other_category') ? 'invalid' : '' }}">
        <label class="form-label" for="other_category">{{ trans('cruds.manageVaccinationRecord.fields.other_category') }}</label>
        <input class="form-control" type="text" name="other_category" id="other_category" wire:model.defer="manageVaccinationRecord.other_category">
        <div class="validation-message">
            {{ $errors->first('manageVaccinationRecord.other_category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.other_category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageVaccinationRecord.next_vac_date_month_yea_r') ? 'invalid' : '' }}">
        <label class="form-label" for="next_vac_date_month_yea_r">{{ trans('cruds.manageVaccinationRecord.fields.next_vac_date_month_yea_r') }}</label>
        <x-date-picker class="form-control" wire:model="manageVaccinationRecord.next_vac_date_month_yea_r" id="next_vac_date_month_yea_r" name="next_vac_date_month_yea_r" picker="date" />
        <div class="validation-message">
            {{ $errors->first('manageVaccinationRecord.next_vac_date_month_yea_r') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.next_vac_date_month_yea_r_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageVaccinationRecord.attending_officer') ? 'invalid' : '' }}">
        <label class="form-label" for="attending_officer">{{ trans('cruds.manageVaccinationRecord.fields.attending_officer') }}</label>
        <input class="form-control" type="text" name="attending_officer" id="attending_officer" wire:model.defer="manageVaccinationRecord.attending_officer">
        <div class="validation-message">
            {{ $errors->first('manageVaccinationRecord.attending_officer') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageVaccinationRecord.fields.attending_officer_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.manage-vaccination-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>