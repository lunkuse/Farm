<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('breed.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.breed.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="breed.name">
        <div class="validation-message">
            {{ $errors->first('breed.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.breed.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('breed.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.breed.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="breed.description">
        <div class="validation-message">
            {{ $errors->first('breed.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.breed.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.breeds.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>