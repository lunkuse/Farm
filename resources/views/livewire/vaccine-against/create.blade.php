<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('vaccineAgainst.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.vaccineAgainst.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="vaccineAgainst.name">
        <div class="validation-message">
            {{ $errors->first('vaccineAgainst.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vaccineAgainst.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('vaccineAgainst.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.vaccineAgainst.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="vaccineAgainst.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('vaccineAgainst.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.vaccineAgainst.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.vaccine-againsts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>