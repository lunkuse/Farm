<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('orchardRecord.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.orchardRecord.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="orchardRecord.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('orchardRecord.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orchardRecord.fruit_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="fruit_type">{{ trans('cruds.orchardRecord.fields.fruit_type') }}</label>
        <x-select-list class="form-control" id="fruit_type" name="fruit_type" :options="$this->listsForFields['fruit_type']" wire:model="orchardRecord.fruit_type_id" />
        <div class="validation-message">
            {{ $errors->first('orchardRecord.fruit_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.fruit_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orchardRecord.fruits_harvested') ? 'invalid' : '' }}">
        <label class="form-label" for="fruits_harvested">{{ trans('cruds.orchardRecord.fields.fruits_harvested') }}</label>
        <input class="form-control" type="number" name="fruits_harvested" id="fruits_harvested" wire:model.defer="orchardRecord.fruits_harvested" step="1">
        <div class="validation-message">
            {{ $errors->first('orchardRecord.fruits_harvested') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.fruits_harvested_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orchardRecord.fruits_cleaned') ? 'invalid' : '' }}">
        <label class="form-label" for="fruits_cleaned">{{ trans('cruds.orchardRecord.fields.fruits_cleaned') }}</label>
        <input class="form-control" type="number" name="fruits_cleaned" id="fruits_cleaned" wire:model.defer="orchardRecord.fruits_cleaned" step="1">
        <div class="validation-message">
            {{ $errors->first('orchardRecord.fruits_cleaned') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.fruits_cleaned_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orchardRecord.fruits_sorted_out') ? 'invalid' : '' }}">
        <label class="form-label" for="fruits_sorted_out">{{ trans('cruds.orchardRecord.fields.fruits_sorted_out') }}</label>
        <input class="form-control" type="number" name="fruits_sorted_out" id="fruits_sorted_out" wire:model.defer="orchardRecord.fruits_sorted_out" step="1">
        <div class="validation-message">
            {{ $errors->first('orchardRecord.fruits_sorted_out') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.fruits_sorted_out_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orchardRecord.fruits_eaten') ? 'invalid' : '' }}">
        <label class="form-label" for="fruits_eaten">{{ trans('cruds.orchardRecord.fields.fruits_eaten') }}</label>
        <input class="form-control" type="number" name="fruits_eaten" id="fruits_eaten" wire:model.defer="orchardRecord.fruits_eaten" step="1">
        <div class="validation-message">
            {{ $errors->first('orchardRecord.fruits_eaten') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.fruits_eaten_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('harvestors') ? 'invalid' : '' }}">
        <label class="form-label" for="harvestors">{{ trans('cruds.orchardRecord.fields.harvestors') }}</label>
        <x-select-list class="form-control" id="harvestors" name="harvestors" wire:model="harvestors" :options="$this->listsForFields['harvestors']" multiple />
        <div class="validation-message">
            {{ $errors->first('harvestors') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.harvestors_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.orchardRecord.fields.comments') }}</label>
        <x-select-list class="form-control" id="comments" name="comments" wire:model="comments" :options="$this->listsForFields['comments']" multiple />
        <div class="validation-message">
            {{ $errors->first('comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.comments_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('orchardRecord.recording_officer_id') ? 'invalid' : '' }}">
        <label class="form-label" for="recording_officer">{{ trans('cruds.orchardRecord.fields.recording_officer') }}</label>
        <x-select-list class="form-control" id="recording_officer" name="recording_officer" :options="$this->listsForFields['recording_officer']" wire:model="orchardRecord.recording_officer_id" />
        <div class="validation-message">
            {{ $errors->first('orchardRecord.recording_officer_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.orchardRecord.fields.recording_officer_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.orchard-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>