<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('treatmentAdministered.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.treatmentAdministered.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="treatmentAdministered.name">
        <div class="validation-message">
            {{ $errors->first('treatmentAdministered.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.treatmentAdministered.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('treatmentAdministered.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.treatmentAdministered.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" wire:model.defer="treatmentAdministered.description">
        <div class="validation-message">
            {{ $errors->first('treatmentAdministered.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.treatmentAdministered.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.treatment-administereds.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>