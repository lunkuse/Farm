<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('clinicalHistory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.clinicalHistory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="clinicalHistory.name">
        <div class="validation-message">
            {{ $errors->first('clinicalHistory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clinicalHistory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('clinicalHistory.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.clinicalHistory.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="clinicalHistory.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('clinicalHistory.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.clinicalHistory.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.clinical-histories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>