<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('currentDiagnosi.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.currentDiagnosi.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="currentDiagnosi.name">
        <div class="validation-message">
            {{ $errors->first('currentDiagnosi.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.currentDiagnosi.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('currentDiagnosi.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.currentDiagnosi.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="currentDiagnosi.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('currentDiagnosi.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.currentDiagnosi.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.current-diagnosis.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>