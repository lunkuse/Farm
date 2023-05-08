<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('user_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="User" format="csv" />
                <livewire:excel-export model="User" format="xlsx" />
                <livewire:excel-export model="User" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.user.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.profile_picture') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                            @include('components.table.sort', ['field' => 'email_verified_at'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.locale') }}
                            @include('components.table.sort', ['field' => 'locale'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.date_of_birth') }}
                            @include('components.table.sort', ['field' => 'date_of_birth'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.identification') }}
                            @include('components.table.sort', ['field' => 'identification'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.identification_copy') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.emergency_contact_1') }}
                            @include('components.table.sort', ['field' => 'emergency_contact_1'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.emergency_contact_2') }}
                            @include('components.table.sort', ['field' => 'emergency_contact_2'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.emergency_contact_3') }}
                            @include('components.table.sort', ['field' => 'emergency_contact_3'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.district') }}
                            @include('components.table.sort', ['field' => 'district'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.parish') }}
                            @include('components.table.sort', ['field' => 'parish'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.village') }}
                            @include('components.table.sort', ['field' => 'village'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.sub_county') }}
                            @include('components.table.sort', ['field' => 'sub_county'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.health_condition') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.other_health_condition') }}
                            @include('components.table.sort', ['field' => 'other_health_condition'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.spiritual_affiliation') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.other_spiritual_affiliation') }}
                            @include('components.table.sort', ['field' => 'other_spiritual_affiliation'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.skill') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.other_skill') }}
                            @include('components.table.sort', ['field' => 'other_skill'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.notes') }}
                            @include('components.table.sort', ['field' => 'notes'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.other_files') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.is_approved') }}
                            @include('components.table.sort', ['field' => 'is_approved'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                @foreach($user->profile_picture as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td>
                                {{ $user->email_verified_at }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->locale }}
                            </td>
                            <td>
                                {{ $user->date_of_birth }}
                            </td>
                            <td>
                                {{ $user->identification_label }}
                            </td>
                            <td>
                                @foreach($user->identification_copy as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->emergency_contact_1 }}
                            </td>
                            <td>
                                {{ $user->emergency_contact_2 }}
                            </td>
                            <td>
                                {{ $user->emergency_contact_3 }}
                            </td>
                            <td>
                                {{ $user->district }}
                            </td>
                            <td>
                                {{ $user->parish }}
                            </td>
                            <td>
                                {{ $user->village }}
                            </td>
                            <td>
                                {{ $user->sub_county }}
                            </td>
                            <td>
                                @foreach($user->healthCondition as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->other_health_condition }}
                            </td>
                            <td>
                                @foreach($user->spiritualAffiliation as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->other_spiritual_affiliation }}
                            </td>
                            <td>
                                @foreach($user->skill as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->other_skill }}
                            </td>
                            <td>
                                {{ $user->notes }}
                            </td>
                            <td>
                                @foreach($user->other_files as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $user->is_approved ? 'checked' : '' }}>
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('user_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.users.show', $user) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.users.edit', $user) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $users->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush