<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('manageHealthRecord.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.manageHealthRecord.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="manageHealthRecord.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageHealthRecord.tag_no_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="tag_no">{{ trans('cruds.manageHealthRecord.fields.tag_no') }}</label>
        <x-select-list class="form-control" required id="tag_no" name="tag_no" :options="$this->listsForFields['tag_no']" wire:model="manageHealthRecord.tag_no_id" />
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.tag_no_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.tag_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('clinical_history') ? 'invalid' : '' }}">
        <label class="form-label" for="clinical_history">{{ trans('cruds.manageHealthRecord.fields.clinical_history') }}</label>
        <x-select-list class="form-control" id="clinical_history" name="clinical_history" wire:model="clinical_history" :options="$this->listsForFields['clinical_history']" multiple />
        <div class="validation-message">
            {{ $errors->first('clinical_history') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.clinical_history_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageHealthRecord.other_clinical_history') ? 'invalid' : '' }}">
        <label class="form-label" for="other_clinical_history">{{ trans('cruds.manageHealthRecord.fields.other_clinical_history') }}</label>
        <input class="form-control" type="text" name="other_clinical_history" id="other_clinical_history" wire:model.defer="manageHealthRecord.other_clinical_history">
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.other_clinical_history') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.other_clinical_history_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('current_diagnosis') ? 'invalid' : '' }}">
        <label class="form-label" for="current_diagnosis">{{ trans('cruds.manageHealthRecord.fields.current_diagnosis') }}</label>
        <x-select-list class="form-control" id="current_diagnosis" name="current_diagnosis" wire:model="current_diagnosis" :options="$this->listsForFields['current_diagnosis']" multiple />
        <div class="validation-message">
            {{ $errors->first('current_diagnosis') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.current_diagnosis_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageHealthRecord.other_current_diagnosis') ? 'invalid' : '' }}">
        <label class="form-label" for="other_current_diagnosis">{{ trans('cruds.manageHealthRecord.fields.other_current_diagnosis') }}</label>
        <input class="form-control" type="text" name="other_current_diagnosis" id="other_current_diagnosis" wire:model.defer="manageHealthRecord.other_current_diagnosis">
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.other_current_diagnosis') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.other_current_diagnosis_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('treatment_administered') ? 'invalid' : '' }}">
        <label class="form-label" for="treatment_administered">{{ trans('cruds.manageHealthRecord.fields.treatment_administered') }}</label>
        <x-select-list class="form-control" id="treatment_administered" name="treatment_administered" wire:model="treatment_administered" :options="$this->listsForFields['treatment_administered']" multiple />
        <div class="validation-message">
            {{ $errors->first('treatment_administered') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.treatment_administered_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageHealthRecord.other_treatment_administered') ? 'invalid' : '' }}">
        <label class="form-label" for="other_treatment_administered">{{ trans('cruds.manageHealthRecord.fields.other_treatment_administered') }}</label>
        <input class="form-control" type="text" name="other_treatment_administered" id="other_treatment_administered" wire:model.defer="manageHealthRecord.other_treatment_administered">
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.other_treatment_administered') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.other_treatment_administered_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageHealthRecord.attending_officer') ? 'invalid' : '' }}">
        <label class="form-label" for="attending_officer">{{ trans('cruds.manageHealthRecord.fields.attending_officer') }}</label>
        <input class="form-control" type="text" name="attending_officer" id="attending_officer" wire:model.defer="manageHealthRecord.attending_officer">
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.attending_officer') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.attending_officer_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageHealthRecord.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.manageHealthRecord.fields.comments') }}</label>
        <textarea class="form-control" name="comments" id="comments" wire:model.defer="manageHealthRecord.comments" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.comments_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageHealthRecord.stock_attendant_id') ? 'invalid' : '' }}">
        <label class="form-label" for="stock_attendant">{{ trans('cruds.manageHealthRecord.fields.stock_attendant') }}</label>
        <x-select-list class="form-control" id="stock_attendant" name="stock_attendant" :options="$this->listsForFields['stock_attendant']" wire:model="manageHealthRecord.stock_attendant_id" />
        <div class="validation-message">
            {{ $errors->first('manageHealthRecord.stock_attendant_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageHealthRecord.fields.stock_attendant_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.manage-health-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>