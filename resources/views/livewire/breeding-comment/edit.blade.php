<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('breedingComment.comment') ? 'invalid' : '' }}">
        <label class="form-label required" for="comment">{{ trans('cruds.breedingComment.fields.comment') }}</label>
        <textarea class="form-control" name="comment" id="comment" required wire:model.defer="breedingComment.comment" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('breedingComment.comment') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.breedingComment.fields.comment_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.breeding-comments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>