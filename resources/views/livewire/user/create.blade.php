<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('mediaCollections.user_profile_picture') ? 'invalid' : '' }}">
        <label class="form-label" for="profile_picture">{{ trans('cruds.user.fields.profile_picture') }}</label>
        <x-dropzone id="profile_picture" name="profile_picture" action="{{ route('admin.users.storeMedia') }}" collection-name="user_profile_picture" max-file-size="8" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_profile_picture') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.profile_picture_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label required" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" required wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.date_of_birth') ? 'invalid' : '' }}">
        <label class="form-label" for="date_of_birth">{{ trans('cruds.user.fields.date_of_birth') }}</label>
        <x-date-picker class="form-control" wire:model="user.date_of_birth" id="date_of_birth" name="date_of_birth" picker="date" />
        <div class="validation-message">
            {{ $errors->first('user.date_of_birth') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.date_of_birth_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.identification') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.user.fields.identification') }}</label>
        <select class="form-control" wire:model="user.identification">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['identification'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('user.identification') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.identification_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.user_identification_copy') ? 'invalid' : '' }}">
        <label class="form-label" for="identification_copy">{{ trans('cruds.user.fields.identification_copy') }}</label>
        <x-dropzone id="identification_copy" name="identification_copy" action="{{ route('admin.users.storeMedia') }}" collection-name="user_identification_copy" max-file-size="8" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_identification_copy') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.identification_copy_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.emergency_contact_1') ? 'invalid' : '' }}">
        <label class="form-label" for="emergency_contact_1">{{ trans('cruds.user.fields.emergency_contact_1') }}</label>
        <input class="form-control" type="text" name="emergency_contact_1" id="emergency_contact_1" wire:model.defer="user.emergency_contact_1">
        <div class="validation-message">
            {{ $errors->first('user.emergency_contact_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.emergency_contact_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.emergency_contact_2') ? 'invalid' : '' }}">
        <label class="form-label" for="emergency_contact_2">{{ trans('cruds.user.fields.emergency_contact_2') }}</label>
        <input class="form-control" type="text" name="emergency_contact_2" id="emergency_contact_2" wire:model.defer="user.emergency_contact_2">
        <div class="validation-message">
            {{ $errors->first('user.emergency_contact_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.emergency_contact_2_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.emergency_contact_3') ? 'invalid' : '' }}">
        <label class="form-label" for="emergency_contact_3">{{ trans('cruds.user.fields.emergency_contact_3') }}</label>
        <input class="form-control" type="text" name="emergency_contact_3" id="emergency_contact_3" wire:model.defer="user.emergency_contact_3">
        <div class="validation-message">
            {{ $errors->first('user.emergency_contact_3') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.emergency_contact_3_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.district') ? 'invalid' : '' }}">
        <label class="form-label" for="district">{{ trans('cruds.user.fields.district') }}</label>
        <input class="form-control" type="text" name="district" id="district" wire:model.defer="user.district">
        <div class="validation-message">
            {{ $errors->first('user.district') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.district_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.parish') ? 'invalid' : '' }}">
        <label class="form-label" for="parish">{{ trans('cruds.user.fields.parish') }}</label>
        <input class="form-control" type="text" name="parish" id="parish" wire:model.defer="user.parish">
        <div class="validation-message">
            {{ $errors->first('user.parish') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.parish_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.village') ? 'invalid' : '' }}">
        <label class="form-label" for="village">{{ trans('cruds.user.fields.village') }}</label>
        <input class="form-control" type="text" name="village" id="village" wire:model.defer="user.village">
        <div class="validation-message">
            {{ $errors->first('user.village') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.village_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.sub_county') ? 'invalid' : '' }}">
        <label class="form-label" for="sub_county">{{ trans('cruds.user.fields.sub_county') }}</label>
        <input class="form-control" type="text" name="sub_county" id="sub_county" wire:model.defer="user.sub_county">
        <div class="validation-message">
            {{ $errors->first('user.sub_county') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.sub_county_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('health_condition') ? 'invalid' : '' }}">
        <label class="form-label" for="health_condition">{{ trans('cruds.user.fields.health_condition') }}</label>
        <x-select-list class="form-control" id="health_condition" name="health_condition" wire:model="health_condition" :options="$this->listsForFields['health_condition']" multiple />
        <div class="validation-message">
            {{ $errors->first('health_condition') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.health_condition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.other_health_condition') ? 'invalid' : '' }}">
        <label class="form-label" for="other_health_condition">{{ trans('cruds.user.fields.other_health_condition') }}</label>
        <input class="form-control" type="text" name="other_health_condition" id="other_health_condition" wire:model.defer="user.other_health_condition">
        <div class="validation-message">
            {{ $errors->first('user.other_health_condition') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.other_health_condition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('spiritual_affiliation') ? 'invalid' : '' }}">
        <label class="form-label required" for="spiritual_affiliation">{{ trans('cruds.user.fields.spiritual_affiliation') }}</label>
        <x-select-list class="form-control" required id="spiritual_affiliation" name="spiritual_affiliation" wire:model="spiritual_affiliation" :options="$this->listsForFields['spiritual_affiliation']" multiple />
        <div class="validation-message">
            {{ $errors->first('spiritual_affiliation') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.spiritual_affiliation_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.other_spiritual_affiliation') ? 'invalid' : '' }}">
        <label class="form-label" for="other_spiritual_affiliation">{{ trans('cruds.user.fields.other_spiritual_affiliation') }}</label>
        <input class="form-control" type="text" name="other_spiritual_affiliation" id="other_spiritual_affiliation" wire:model.defer="user.other_spiritual_affiliation">
        <div class="validation-message">
            {{ $errors->first('user.other_spiritual_affiliation') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.other_spiritual_affiliation_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('skill') ? 'invalid' : '' }}">
        <label class="form-label" for="skill">{{ trans('cruds.user.fields.skill') }}</label>
        <x-select-list class="form-control" id="skill" name="skill" wire:model="skill" :options="$this->listsForFields['skill']" multiple />
        <div class="validation-message">
            {{ $errors->first('skill') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.skill_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.other_skill') ? 'invalid' : '' }}">
        <label class="form-label" for="other_skill">{{ trans('cruds.user.fields.other_skill') }}</label>
        <input class="form-control" type="text" name="other_skill" id="other_skill" wire:model.defer="user.other_skill">
        <div class="validation-message">
            {{ $errors->first('user.other_skill') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.other_skill_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.notes') ? 'invalid' : '' }}">
        <label class="form-label" for="notes">{{ trans('cruds.user.fields.notes') }}</label>
        <textarea class="form-control" name="notes" id="notes" wire:model.defer="user.notes" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('user.notes') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.notes_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.user_other_files') ? 'invalid' : '' }}">
        <label class="form-label" for="other_files">{{ trans('cruds.user.fields.other_files') }}</label>
        <x-dropzone id="other_files" name="other_files" action="{{ route('admin.users.storeMedia') }}" collection-name="user_other_files" max-file-size="8" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.user_other_files') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.other_files_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.is_approved') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="is_approved" id="is_approved" wire:model.defer="user.is_approved">
        <label class="form-label inline ml-1" for="is_approved">{{ trans('cruds.user.fields.is_approved') }}</label>
        <div class="validation-message">
            {{ $errors->first('user.is_approved') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.is_approved_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>