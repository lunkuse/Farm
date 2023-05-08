<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('gender.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.gender.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="gender.name">
        <div class="validation-message">
            {{ $errors->first('gender.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gender.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('gender.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.gender.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="gender.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('gender.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.gender.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.genders.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>