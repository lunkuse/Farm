<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('block') ? 'invalid' : '' }}">
        <label class="form-label" for="block">{{ trans('cruds.manageEctoParasite.fields.block') }}</label>
        <x-select-list class="form-control" id="block" name="block" wire:model="block" :options="$this->listsForFields['block']" multiple />
        <div class="validation-message">
            {{ $errors->first('block') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.block_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageEctoParasite.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.manageEctoParasite.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="manageEctoParasite.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('manageEctoParasite.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('acaricide_used') ? 'invalid' : '' }}">
        <label class="form-label" for="acaricide_used">{{ trans('cruds.manageEctoParasite.fields.acaricide_used') }}</label>
        <x-select-list class="form-control" id="acaricide_used" name="acaricide_used" wire:model="acaricide_used" :options="$this->listsForFields['acaricide_used']" multiple />
        <div class="validation-message">
            {{ $errors->first('acaricide_used') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.acaricide_used_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageEctoParasite.other_acaricide') ? 'invalid' : '' }}">
        <label class="form-label" for="other_acaricide">{{ trans('cruds.manageEctoParasite.fields.other_acaricide') }}</label>
        <input class="form-control" type="text" name="other_acaricide" id="other_acaricide" wire:model.defer="manageEctoParasite.other_acaricide">
        <div class="validation-message">
            {{ $errors->first('manageEctoParasite.other_acaricide') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.other_acaricide_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageEctoParasite.time_of_spray') ? 'invalid' : '' }}">
        <label class="form-label" for="time_of_spray">{{ trans('cruds.manageEctoParasite.fields.time_of_spray') }}</label>
        <x-date-picker class="form-control" wire:model="manageEctoParasite.time_of_spray" id="time_of_spray" name="time_of_spray" picker="time" />
        <div class="validation-message">
            {{ $errors->first('manageEctoParasite.time_of_spray') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.time_of_spray_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageEctoParasite.next_spray_date') ? 'invalid' : '' }}">
        <label class="form-label" for="next_spray_date">{{ trans('cruds.manageEctoParasite.fields.next_spray_date') }}</label>
        <x-date-picker class="form-control" wire:model="manageEctoParasite.next_spray_date" id="next_spray_date" name="next_spray_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('manageEctoParasite.next_spray_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.next_spray_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageEctoParasite.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.manageEctoParasite.fields.comments') }}</label>
        <textarea class="form-control" name="comments" id="comments" wire:model.defer="manageEctoParasite.comments" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('manageEctoParasite.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.comments_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageEctoParasite.attending_officer') ? 'invalid' : '' }}">
        <label class="form-label" for="attending_officer">{{ trans('cruds.manageEctoParasite.fields.attending_officer') }}</label>
        <input class="form-control" type="text" name="attending_officer" id="attending_officer" wire:model.defer="manageEctoParasite.attending_officer">
        <div class="validation-message">
            {{ $errors->first('manageEctoParasite.attending_officer') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageEctoParasite.fields.attending_officer_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.manage-ecto-parasites.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>