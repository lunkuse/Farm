<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('manage_health_record_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ManageHealthRecord" format="csv" />
                <livewire:excel-export model="ManageHealthRecord" format="xlsx" />
                <livewire:excel-export model="ManageHealthRecord" format="pdf" />
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
                            {{ trans('cruds.manageHealthRecord.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.tag_no') }}
                            @include('components.table.sort', ['field' => 'tag_no.tag_no'])
                        </th>
                        <th>
                            {{ trans('cruds.generalStockRecord.fields.dob') }}
                            @include('components.table.sort', ['field' => 'tag_no.dob'])
                        </th>
                        <!--<th>-->
                        <!--    {{ trans('cruds.manageHealthRecord.fields.clinical_history') }}-->
                        <!--</th>-->
                        <!--<th>-->
                        <!--    {{ trans('cruds.manageHealthRecord.fields.other_clinical_history') }}-->
                        <!--    @include('components.table.sort', ['field' => 'other_clinical_history'])-->
                        <!--</th>-->
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.current_diagnosis') }}
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.other_current_diagnosis') }}
                            @include('components.table.sort', ['field' => 'other_current_diagnosis'])
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.treatment_administered') }}
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.other_treatment_administered') }}
                            @include('components.table.sort', ['field' => 'other_treatment_administered'])
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.attending_officer') }}
                            @include('components.table.sort', ['field' => 'attending_officer'])
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.comments') }}
                            @include('components.table.sort', ['field' => 'comments'])
                        </th>
                        <th>
                            {{ trans('cruds.manageHealthRecord.fields.stock_attendant') }}
                            @include('components.table.sort', ['field' => 'stock_attendant.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($manageHealthRecords as $manageHealthRecord)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $manageHealthRecord->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $manageHealthRecord->id }}
                            </td>
                            <td>
                                {{ $manageHealthRecord->date }}
                            </td>
                            <td>
                                @if($manageHealthRecord->tagNo)
                                    <span class="badge badge-relationship">{{ $manageHealthRecord->tagNo->tag_no ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($manageHealthRecord->tagNo)
                                    {{ $manageHealthRecord->tagNo->dob ?? '' }}
                                @endif
                            </td>
                            <!--<td>-->
                            <!--    @foreach($manageHealthRecord->clinicalHistory as $key => $entry)-->
                            <!--        <span class="badge badge-relationship">{{ $entry->name }}</span>-->
                            <!--    @endforeach-->
                            <!--</td>-->
                            <!--<td>-->
                            <!--    {{ $manageHealthRecord->other_clinical_history }}-->
                            <!--</td>-->
                            <td>
                                @foreach($manageHealthRecord->currentDiagnosis as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $manageHealthRecord->other_current_diagnosis }}
                            </td>
                            <td>
                                @foreach($manageHealthRecord->treatmentAdministered as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $manageHealthRecord->other_treatment_administered }}
                            </td>
                            <td>
                                {{ $manageHealthRecord->attending_officer }}
                            </td>
                            <td>
                                {{ $manageHealthRecord->comments }}
                            </td>
                            <td>
                                @if($manageHealthRecord->stockAttendant)
                                    <span class="badge badge-relationship">{{ $manageHealthRecord->stockAttendant->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('manage_health_record_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.manage-health-records.show', $manageHealthRecord) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('manage_health_record_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.manage-health-records.edit', $manageHealthRecord) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('manage_health_record_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $manageHealthRecord->id }})" wire:loading.attr="disabled">
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
            {{ $manageHealthRecords->links() }}
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