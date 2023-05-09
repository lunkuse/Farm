<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('staffPerfomance.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.staffPerfomance.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="staffPerfomance.name">
        <div class="validation-message">
            {{ $errors->first('staffPerfomance.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staffPerfomance.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staffPerfomance.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.staffPerfomance.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="staffPerfomance.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('staffPerfomance.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staffPerfomance.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.staff-perfomances.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>