<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('healthCondition.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.healthCondition.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="healthCondition.title">
        <div class="validation-message">
            {{ $errors->first('healthCondition.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.healthCondition.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('healthCondition.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.healthCondition.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="healthCondition.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('healthCondition.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.healthCondition.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.health-conditions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>