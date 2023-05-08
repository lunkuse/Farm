<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('source.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.source.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="source.name">
        <div class="validation-message">
            {{ $errors->first('source.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.source.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('source.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.source.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="source.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('source.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.source.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sources.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>