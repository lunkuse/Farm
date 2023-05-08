<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('expenditureType.type') ? 'invalid' : '' }}">
        <label class="form-label required" for="type">{{ trans('cruds.expenditureType.fields.type') }}</label>
        <input class="form-control" type="text" name="type" id="type" required wire:model.defer="expenditureType.type">
        <div class="validation-message">
            {{ $errors->first('expenditureType.type') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expenditureType.fields.type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('expenditureType.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.expenditureType.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="expenditureType.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('expenditureType.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.expenditureType.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.expenditure-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>