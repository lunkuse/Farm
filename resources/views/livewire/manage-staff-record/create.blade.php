<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('manageStaffRecord.staff_name_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="staff_name">{{ trans('cruds.manageStaffRecord.fields.staff_name') }}</label>
        <x-select-list class="form-control" required id="staff_name" name="staff_name" :options="$this->listsForFields['staff_name']" wire:model="manageStaffRecord.staff_name_id" />
        <div class="validation-message">
            {{ $errors->first('manageStaffRecord.staff_name_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageStaffRecord.fields.staff_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('role') ? 'invalid' : '' }}">
        <label class="form-label" for="role">{{ trans('cruds.manageStaffRecord.fields.role') }}</label>
        <x-select-list class="form-control" id="role" name="role" wire:model="role" :options="$this->listsForFields['role']" multiple />
        <div class="validation-message">
            {{ $errors->first('role') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageStaffRecord.fields.role_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageStaffRecord.wage') ? 'invalid' : '' }}">
        <label class="form-label required" for="wage">{{ trans('cruds.manageStaffRecord.fields.wage') }}</label>
        <input class="form-control" type="number" name="wage" id="wage" required wire:model.defer="manageStaffRecord.wage" step="0.01">
        <div class="validation-message">
            {{ $errors->first('manageStaffRecord.wage') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageStaffRecord.fields.wage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageStaffRecord.payment_record_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_record">{{ trans('cruds.manageStaffRecord.fields.payment_record') }}</label>
        <x-select-list class="form-control" required id="payment_record" name="payment_record" :options="$this->listsForFields['payment_record']" wire:model="manageStaffRecord.payment_record_id" />
        <div class="validation-message">
            {{ $errors->first('manageStaffRecord.payment_record_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageStaffRecord.fields.payment_record_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageStaffRecord.month_year') ? 'invalid' : '' }}">
        <label class="form-label" for="month_year">{{ trans('cruds.manageStaffRecord.fields.month_year') }}</label>
        <input class="form-control" type="text" name="month_year" id="month_year" wire:model.defer="manageStaffRecord.month_year">
        <div class="validation-message">
            {{ $errors->first('manageStaffRecord.month_year') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageStaffRecord.fields.month_year_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageStaffRecord.staff_perfomance_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="staff_perfomance">{{ trans('cruds.manageStaffRecord.fields.staff_perfomance') }}</label>
        <x-select-list class="form-control" required id="staff_perfomance" name="staff_perfomance" :options="$this->listsForFields['staff_perfomance']" wire:model="manageStaffRecord.staff_perfomance_id" />
        <div class="validation-message">
            {{ $errors->first('manageStaffRecord.staff_perfomance_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageStaffRecord.fields.staff_perfomance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('recommendation') ? 'invalid' : '' }}">
        <label class="form-label" for="recommendation">{{ trans('cruds.manageStaffRecord.fields.recommendation') }}</label>
        <x-select-list class="form-control" id="recommendation" name="recommendation" wire:model="recommendation" :options="$this->listsForFields['recommendation']" multiple />
        <div class="validation-message">
            {{ $errors->first('recommendation') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageStaffRecord.fields.recommendation_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.manage-staff-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>