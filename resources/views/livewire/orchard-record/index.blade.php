<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('orchard_record_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="OrchardRecord" format="csv" />
                <livewire:excel-export model="OrchardRecord" format="xlsx" />
                <livewire:excel-export model="OrchardRecord" format="pdf" />
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
                            {{ trans('cruds.orchardRecord.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.fruit_type') }}
                            @include('components.table.sort', ['field' => 'fruit_type.name'])
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.fruits_harvested') }}
                            @include('components.table.sort', ['field' => 'fruits_harvested'])
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.fruits_cleaned') }}
                            @include('components.table.sort', ['field' => 'fruits_cleaned'])
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.fruits_sorted_out') }}
                            @include('components.table.sort', ['field' => 'fruits_sorted_out'])
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.fruits_eaten') }}
                            @include('components.table.sort', ['field' => 'fruits_eaten'])
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.harvestors') }}
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.comments') }}
                        </th>
                        <th>
                            {{ trans('cruds.orchardRecord.fields.recording_officer') }}
                            @include('components.table.sort', ['field' => 'recording_officer.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orchardRecords as $orchardRecord)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $orchardRecord->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $orchardRecord->id }}
                            </td>
                            <td>
                                {{ $orchardRecord->date }}
                            </td>
                            <td>
                                @if($orchardRecord->fruitType)
                                    <span class="badge badge-relationship">{{ $orchardRecord->fruitType->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $orchardRecord->fruits_harvested }}
                            </td>
                            <td>
                                {{ $orchardRecord->fruits_cleaned }}
                            </td>
                            <td>
                                {{ $orchardRecord->fruits_sorted_out }}
                            </td>
                            <td>
                                {{ $orchardRecord->fruits_eaten }}
                            </td>
                            <td>
                                @foreach($orchardRecord->harvestors as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($orchardRecord->comments as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($orchardRecord->recordingOfficer)
                                    <span class="badge badge-relationship">{{ $orchardRecord->recordingOfficer->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('orchard_record_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.orchard-records.show', $orchardRecord) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('orchard_record_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.orchard-records.edit', $orchardRecord) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('orchard_record_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $orchardRecord->id }})" wire:loading.attr="disabled">
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
            {{ $orchardRecords->links() }}
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