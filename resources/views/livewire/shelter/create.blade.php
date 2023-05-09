<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('shelter.block_id') ? 'invalid' : '' }}">
        <label class="form-label" for="block">{{ trans('cruds.shelter.fields.block') }}</label>
        <x-select-list class="form-control" id="block" name="block" :options="$this->listsForFields['block']" wire:model="shelter.block_id" />
        <div class="validation-message">
            {{ $errors->first('shelter.block_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shelter.fields.block_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shelter.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.shelter.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="shelter.name">
        <div class="validation-message">
            {{ $errors->first('shelter.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shelter.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('shelter.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.shelter.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="shelter.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('shelter.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.shelter.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.shelters.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>