<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('skill.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.skill.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="skill.title">
        <div class="validation-message">
            {{ $errors->first('skill.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.skill.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('skill.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.skill.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="skill.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('skill.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.skill.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>