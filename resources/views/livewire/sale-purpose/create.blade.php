<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('salePurpose.purpose') ? 'invalid' : '' }}">
        <label class="form-label required" for="purpose">{{ trans('cruds.salePurpose.fields.purpose') }}</label>
        <input class="form-control" type="text" name="purpose" id="purpose" required wire:model.defer="salePurpose.purpose">
        <div class="validation-message">
            {{ $errors->first('salePurpose.purpose') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.salePurpose.fields.purpose_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('salePurpose.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.salePurpose.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="salePurpose.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('salePurpose.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.salePurpose.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sale-purposes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>