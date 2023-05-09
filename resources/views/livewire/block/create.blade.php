<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('block.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.block.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="block.title">
        <div class="validation-message">
            {{ $errors->first('block.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.block.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('block.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.block.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="block.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('block.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.block.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.blocks.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>