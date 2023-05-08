<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('harvestor.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.harvestor.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="harvestor.title">
        <div class="validation-message">
            {{ $errors->first('harvestor.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.harvestor.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('harvestor.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.harvestor.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="harvestor.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('harvestor.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.harvestor.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.harvestors.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>