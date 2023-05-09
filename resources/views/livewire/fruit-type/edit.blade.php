<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('fruitType.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.fruitType.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="fruitType.name">
        <div class="validation-message">
            {{ $errors->first('fruitType.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fruitType.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('fruitType.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.fruitType.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="fruitType.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('fruitType.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.fruitType.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.fruit-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>