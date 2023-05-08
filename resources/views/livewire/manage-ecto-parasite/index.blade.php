<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('manage_ecto_parasite_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ManageEctoParasite" format="csv" />
                <livewire:excel-export model="ManageEctoParasite" format="xlsx" />
                <livewire:excel-export model="ManageEctoParasite" format="pdf" />
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
                            {{ trans('cruds.manageEctoParasite.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.block') }}
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.acaricide_used') }}
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.other_acaricide') }}
                            @include('components.table.sort', ['field' => 'other_acaricide'])
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.time_of_spray') }}
                            @include('components.table.sort', ['field' => 'time_of_spray'])
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.next_spray_date') }}
                            @include('components.table.sort', ['field' => 'next_spray_date'])
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.comments') }}
                            @include('components.table.sort', ['field' => 'comments'])
                        </th>
                        <th>
                            {{ trans('cruds.manageEctoParasite.fields.attending_officer') }}
                            @include('components.table.sort', ['field' => 'attending_officer'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($manageEctoParasites as $manageEctoParasite)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $manageEctoParasite->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $manageEctoParasite->id }}
                            </td>
                            <td>
                                @foreach($manageEctoParasite->block as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $manageEctoParasite->date }}
                            </td>
                            <td>
                                @foreach($manageEctoParasite->acaricideUsed as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $manageEctoParasite->other_acaricide }}
                            </td>
                            <td>
                                {{ $manageEctoParasite->time_of_spray }}
                            </td>
                            <td>
                                {{ $manageEctoParasite->next_spray_date }}
                            </td>
                            <td>
                                {{ $manageEctoParasite->comments }}
                            </td>
                            <td>
                                {{ $manageEctoParasite->attending_officer }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('manage_ecto_parasite_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.manage-ecto-parasites.show', $manageEctoParasite) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('manage_ecto_parasite_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.manage-ecto-parasites.edit', $manageEctoParasite) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('manage_ecto_parasite_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $manageEctoParasite->id }})" wire:loading.attr="disabled">
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
            {{ $manageEctoParasites->links() }}
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