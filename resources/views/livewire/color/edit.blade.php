<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('color.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.color.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="color.name">
        <div class="validation-message">
            {{ $errors->first('color.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.color.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('color.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.color.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="color.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('color.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.color.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.colors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>