<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('spiritialAffiliation.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.spiritialAffiliation.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="spiritialAffiliation.title">
        <div class="validation-message">
            {{ $errors->first('spiritialAffiliation.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.spiritialAffiliation.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('spiritialAffiliation.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.spiritialAffiliation.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="spiritialAffiliation.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('spiritialAffiliation.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.spiritialAffiliation.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.spiritial-affiliations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>