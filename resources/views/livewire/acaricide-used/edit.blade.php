<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('acaricideUsed.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.acaricideUsed.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="acaricideUsed.name">
        <div class="validation-message">
            {{ $errors->first('acaricideUsed.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.acaricideUsed.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('acaricideUsed.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.acaricideUsed.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="acaricideUsed.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('acaricideUsed.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.acaricideUsed.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.acaricide-useds.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>