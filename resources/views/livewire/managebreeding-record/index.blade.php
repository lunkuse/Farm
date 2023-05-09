<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('managebreeding_record_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ManagebreedingRecord" format="csv" />
                <livewire:excel-export model="ManagebreedingRecord" format="xlsx" />
                <livewire:excel-export model="ManagebreedingRecord" format="pdf" />
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
                            {{ trans('cruds.managebreedingRecord.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.nanny_tag_no') }}
                            @include('components.table.sort', ['field' => 'nanny_tag_no.tag_no'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.age') }}
                            @include('components.table.sort', ['field' => 'nanny_tag_no.age'])
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.buck_tag_no') }}
                            @include('components.table.sort', ['field' => 'buck_tag_no.tag_no'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.age') }}
                            @include('components.table.sort', ['field' => 'buck_tag_no.age'])
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.animal_type') }}
                            @include('components.table.sort', ['field' => 'animal_type.title'])
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.delivery_nature') }}
                            @include('components.table.sort', ['field' => 'delivery_nature.name'])
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.kids_number') }}
                            @include('components.table.sort', ['field' => 'kids_number.name'])
                        </th>
                        <th>
                            {{ trans('cruds.kidNumber.fields.number') }}
                            @include('components.table.sort', ['field' => 'kids_number.number'])
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.kid_sex') }}
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.breeding_comments') }}
                        </th>
                        <th>
                            {{ trans('cruds.managebreedingRecord.fields.tag') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($managebreedingRecords as $managebreedingRecord)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $managebreedingRecord->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $managebreedingRecord->id }}
                            </td>
                            <td>
                                @if($managebreedingRecord->nannyTagNo)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->nannyTagNo->tag_no ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($managebreedingRecord->nannyTagNo)
                                    {{ $managebreedingRecord->nannyTagNo->age ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($managebreedingRecord->buckTagNo)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->buckTagNo->tag_no ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($managebreedingRecord->buckTagNo)
                                    {{ $managebreedingRecord->buckTagNo->age ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{ $managebreedingRecord->date }}
                            </td>
                            <td>
                                @if($managebreedingRecord->animalType)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->animalType->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($managebreedingRecord->deliveryNature)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->deliveryNature->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($managebreedingRecord->kidsNumber)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->kidsNumber->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($managebreedingRecord->kidsNumber)
                                    {{ $managebreedingRecord->kidsNumber->number ?? '' }}
                                @endif
                            </td>
                            <td>
                                @foreach($managebreedingRecord->kidSex as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($managebreedingRecord->breedingComments as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->comment }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($managebreedingRecord->tag as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->tag_no }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('managebreeding_record_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.managebreeding-records.show', $managebreedingRecord) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('managebreeding_record_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.managebreeding-records.edit', $managebreedingRecord) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('managebreeding_record_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $managebreedingRecord->id }})" wire:loading.attr="disabled">
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
            {{ $managebreedingRecords->links() }}
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