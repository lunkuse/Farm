<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('staffRecommendation.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.staffRecommendation.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="staffRecommendation.name">
        <div class="validation-message">
            {{ $errors->first('staffRecommendation.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staffRecommendation.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staffRecommendation.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.staffRecommendation.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="staffRecommendation.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('staffRecommendation.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staffRecommendation.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.staff-recommendations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>