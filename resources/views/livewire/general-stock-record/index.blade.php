<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('general_stock_record_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="GeneralStockRecord" format="csv" />
                <livewire:excel-export model="GeneralStockRecord" format="xlsx" />
                <livewire:excel-export model="GeneralStockRecord" format="pdf" />
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
                            {{ trans('cruds.generalStockRecord.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.shelter') }}
                            @include('components.table.sort', ['field' => 'shelter.name'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.animal_type') }}
                            @include('components.table.sort', ['field' => 'animal_type.title'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.other_animal_type') }}
                            @include('components.table.sort', ['field' => 'other_animal_type'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.tag_no') }}
                            @include('components.table.sort', ['field' => 'tag_no'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.breed') }}
                            @include('components.table.sort', ['field' => 'breed.name'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.other_breed') }}
                            @include('components.table.sort', ['field' => 'other_breed'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.gender') }}
                            @include('components.table.sort', ['field' => 'gender.name'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.dob') }}
                            @include('components.table.sort', ['field' => 'dob'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.age') }}
                            @include('components.table.sort', ['field' => 'age'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.color') }}
                            @include('components.table.sort', ['field' => 'color.name'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.other_color') }}
                            @include('components.table.sort', ['field' => 'other_color'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.source') }}
                            @include('components.table.sort', ['field' => 'source.name'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.other_source') }}
                            @include('components.table.sort', ['field' => 'other_source'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.comments') }}
                            @include('components.table.sort', ['field' => 'comments'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.availability') }}
                            @include('components.table.sort', ['field' => 'availability'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($generalStockRecords as $generalStockRecord)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $generalStockRecord->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $generalStockRecord->id }}
                            </td>
                            <td>
                                {{ $generalStockRecord->date }}
                            </td>
                            <td>
                                @if($generalStockRecord->shelter)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->shelter->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($generalStockRecord->animalType)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->animalType->title ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $generalStockRecord->other_animal_type }}
                            </td>
                            <td>
                                {{ $generalStockRecord->tag_no }}
                            </td>
                            <td>
                                @if($generalStockRecord->breed)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->breed->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $generalStockRecord->other_breed }}
                            </td>
                            <td>
                                @if($generalStockRecord->gender)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->gender->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $generalStockRecord->dob }}
                            </td>
                            <td>
                                {{ $generalStockRecord->age }}
                            </td>
                            <td>
                                @if($generalStockRecord->color)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->color->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $generalStockRecord->other_color }}
                            </td>
                            <td>
                                @if($generalStockRecord->source)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->source->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $generalStockRecord->other_source }}
                            </td>
                            <td>
                                {{ $generalStockRecord->comments }}
                            </td>
                            <td>
                                {{ $generalStockRecord->availability_label }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('general_stock_record_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.general-stock-records.show', $generalStockRecord) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('general_stock_record_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.general-stock-records.edit', $generalStockRecord) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('general_stock_record_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $generalStockRecord->id }})" wire:loading.attr="disabled">
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
            {{ $generalStockRecords->links() }}
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