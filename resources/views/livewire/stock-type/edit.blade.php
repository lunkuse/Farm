<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('stockType.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.stockType.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="stockType.title">
        <div class="validation-message">
            {{ $errors->first('stockType.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stockType.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('stockType.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.stockType.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="stockType.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('stockType.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stockType.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.stock-types.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>