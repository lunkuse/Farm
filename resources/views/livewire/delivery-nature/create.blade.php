<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('deliveryNature.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.deliveryNature.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="deliveryNature.name">
        <div class="validation-message">
            {{ $errors->first('deliveryNature.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.deliveryNature.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('deliveryNature.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.deliveryNature.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="deliveryNature.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('deliveryNature.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.deliveryNature.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.delivery-natures.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>