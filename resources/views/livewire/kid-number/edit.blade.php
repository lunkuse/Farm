<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('kidNumber.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.kidNumber.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="kidNumber.name">
        <div class="validation-message">
            {{ $errors->first('kidNumber.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kidNumber.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kidNumber.number') ? 'invalid' : '' }}">
        <label class="form-label" for="number">{{ trans('cruds.kidNumber.fields.number') }}</label>
        <input class="form-control" type="number" name="number" id="number" wire:model.defer="kidNumber.number" step="1">
        <div class="validation-message">
            {{ $errors->first('kidNumber.number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kidNumber.fields.number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kidNumber.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.kidNumber.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="kidNumber.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('kidNumber.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kidNumber.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.kid-numbers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>