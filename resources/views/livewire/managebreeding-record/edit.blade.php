<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('managebreedingRecord.nanny_tag_no_id') ? 'invalid' : '' }}">
        <label class="form-label" for="nanny_tag_no">{{ trans('cruds.managebreedingRecord.fields.nanny_tag_no') }}</label>
        <x-select-list class="form-control" id="nanny_tag_no" name="nanny_tag_no" :options="$this->listsForFields['nanny_tag_no']" wire:model="managebreedingRecord.nanny_tag_no_id" />
        <div class="validation-message">
            {{ $errors->first('managebreedingRecord.nanny_tag_no_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.nanny_tag_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('managebreedingRecord.buck_tag_no_id') ? 'invalid' : '' }}">
        <label class="form-label" for="buck_tag_no">{{ trans('cruds.managebreedingRecord.fields.buck_tag_no') }}</label>
        <x-select-list class="form-control" id="buck_tag_no" name="buck_tag_no" :options="$this->listsForFields['buck_tag_no']" wire:model="managebreedingRecord.buck_tag_no_id" />
        <div class="validation-message">
            {{ $errors->first('managebreedingRecord.buck_tag_no_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.buck_tag_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('managebreedingRecord.date') ? 'invalid' : '' }}">
        <label class="form-label" for="date">{{ trans('cruds.managebreedingRecord.fields.date') }}</label>
        <x-date-picker class="form-control" wire:model="managebreedingRecord.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('managebreedingRecord.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('managebreedingRecord.animal_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="animal_type">{{ trans('cruds.managebreedingRecord.fields.animal_type') }}</label>
        <x-select-list class="form-control" id="animal_type" name="animal_type" :options="$this->listsForFields['animal_type']" wire:model="managebreedingRecord.animal_type_id" />
        <div class="validation-message">
            {{ $errors->first('managebreedingRecord.animal_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.animal_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('managebreedingRecord.delivery_nature_id') ? 'invalid' : '' }}">
        <label class="form-label" for="delivery_nature">{{ trans('cruds.managebreedingRecord.fields.delivery_nature') }}</label>
        <x-select-list class="form-control" id="delivery_nature" name="delivery_nature" :options="$this->listsForFields['delivery_nature']" wire:model="managebreedingRecord.delivery_nature_id" />
        <div class="validation-message">
            {{ $errors->first('managebreedingRecord.delivery_nature_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.delivery_nature_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('managebreedingRecord.kids_number_id') ? 'invalid' : '' }}">
        <label class="form-label" for="kids_number">{{ trans('cruds.managebreedingRecord.fields.kids_number') }}</label>
        <x-select-list class="form-control" id="kids_number" name="kids_number" :options="$this->listsForFields['kids_number']" wire:model="managebreedingRecord.kids_number_id" />
        <div class="validation-message">
            {{ $errors->first('managebreedingRecord.kids_number_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.kids_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kid_sex') ? 'invalid' : '' }}">
        <label class="form-label" for="kid_sex">{{ trans('cruds.managebreedingRecord.fields.kid_sex') }}</label>
        <x-select-list class="form-control" id="kid_sex" name="kid_sex" wire:model="kid_sex" :options="$this->listsForFields['kid_sex']" multiple />
        <div class="validation-message">
            {{ $errors->first('kid_sex') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.kid_sex_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('breeding_comments') ? 'invalid' : '' }}">
        <label class="form-label" for="breeding_comments">{{ trans('cruds.managebreedingRecord.fields.breeding_comments') }}</label>
        <x-select-list class="form-control" id="breeding_comments" name="breeding_comments" wire:model="breeding_comments" :options="$this->listsForFields['breeding_comments']" multiple />
        <div class="validation-message">
            {{ $errors->first('breeding_comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.breeding_comments_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tag') ? 'invalid' : '' }}">
        <label class="form-label" for="tag">{{ trans('cruds.managebreedingRecord.fields.tag') }}</label>
        <x-select-list class="form-control" id="tag" name="tag" wire:model="tag" :options="$this->listsForFields['tag']" multiple />
        <div class="validation-message">
            {{ $errors->first('tag') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.managebreedingRecord.fields.tag_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.managebreeding-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>