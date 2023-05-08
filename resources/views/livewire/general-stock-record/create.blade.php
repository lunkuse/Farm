<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('generalStockRecord.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.generalStockRecord.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="generalStockRecord.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.shelter_id') ? 'invalid' : '' }}">
        <label class="form-label" for="shelter">{{ trans('cruds.generalStockRecord.fields.shelter') }}</label>
        <x-select-list class="form-control" id="shelter" name="shelter" :options="$this->listsForFields['shelter']" wire:model="generalStockRecord.shelter_id" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.shelter_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.shelter_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.animal_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="animal_type">{{ trans('cruds.generalStockRecord.fields.animal_type') }}</label>
        <x-select-list class="form-control" id="animal_type" name="animal_type" :options="$this->listsForFields['animal_type']" wire:model="generalStockRecord.animal_type_id" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.animal_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.animal_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.other_animal_type') ? 'invalid' : '' }}">
        <label class="form-label" for="other_animal_type">{{ trans('cruds.generalStockRecord.fields.other_animal_type') }}</label>
        <input class="form-control" type="text" name="other_animal_type" id="other_animal_type" wire:model.defer="generalStockRecord.other_animal_type">
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.other_animal_type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.other_animal_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.tag_no') ? 'invalid' : '' }}">
        <label class="form-label" for="tag_no">{{ trans('cruds.generalStockRecord.fields.tag_no') }}</label>
        <input class="form-control" type="text" name="tag_no" id="tag_no" wire:model.defer="generalStockRecord.tag_no">
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.tag_no') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.tag_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.breed_id') ? 'invalid' : '' }}">
        <label class="form-label" for="breed">{{ trans('cruds.generalStockRecord.fields.breed') }}</label>
        <x-select-list class="form-control" id="breed" name="breed" :options="$this->listsForFields['breed']" wire:model="generalStockRecord.breed_id" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.breed_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.breed_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.other_breed') ? 'invalid' : '' }}">
        <label class="form-label" for="other_breed">{{ trans('cruds.generalStockRecord.fields.other_breed') }}</label>
        <input class="form-control" type="text" name="other_breed" id="other_breed" wire:model.defer="generalStockRecord.other_breed">
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.other_breed') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.other_breed_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.gender_id') ? 'invalid' : '' }}">
        <label class="form-label" for="gender">{{ trans('cruds.generalStockRecord.fields.gender') }}</label>
        <x-select-list class="form-control" id="gender" name="gender" :options="$this->listsForFields['gender']" wire:model="generalStockRecord.gender_id" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.gender_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.gender_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.dob') ? 'invalid' : '' }}">
        <label class="form-label" for="dob">{{ trans('cruds.generalStockRecord.fields.dob') }}</label>
        <x-date-picker class="form-control" wire:model="generalStockRecord.dob" id="dob" name="dob" picker="date" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.dob') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.dob_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.age') ? 'invalid' : '' }}">
        <label class="form-label" for="age">{{ trans('cruds.generalStockRecord.fields.age') }}</label>
        <input class="form-control" type="text" name="age" id="age" wire:model.defer="generalStockRecord.age">
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.age') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.age_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.color_id') ? 'invalid' : '' }}">
        <label class="form-label" for="color">{{ trans('cruds.generalStockRecord.fields.color') }}</label>
        <x-select-list class="form-control" id="color" name="color" :options="$this->listsForFields['color']" wire:model="generalStockRecord.color_id" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.color_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.color_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.other_color') ? 'invalid' : '' }}">
        <label class="form-label" for="other_color">{{ trans('cruds.generalStockRecord.fields.other_color') }}</label>
        <input class="form-control" type="text" name="other_color" id="other_color" wire:model.defer="generalStockRecord.other_color">
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.other_color') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.other_color_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.source_id') ? 'invalid' : '' }}">
        <label class="form-label" for="source">{{ trans('cruds.generalStockRecord.fields.source') }}</label>
        <x-select-list class="form-control" id="source" name="source" :options="$this->listsForFields['source']" wire:model="generalStockRecord.source_id" />
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.source_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.source_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.other_source') ? 'invalid' : '' }}">
        <label class="form-label" for="other_source">{{ trans('cruds.generalStockRecord.fields.other_source') }}</label>
        <input class="form-control" type="text" name="other_source" id="other_source" wire:model.defer="generalStockRecord.other_source">
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.other_source') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.other_source_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.generalStockRecord.fields.comments') }}</label>
        <textarea class="form-control" name="comments" id="comments" wire:model.defer="generalStockRecord.comments" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.comments_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('generalStockRecord.availability') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.generalStockRecord.fields.availability') }}</label>
        <select class="form-control" wire:model="generalStockRecord.availability">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['availability'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('generalStockRecord.availability') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.generalStockRecord.fields.availability_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.general-stock-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>