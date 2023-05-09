<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('manage_vaccination_record_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ManageVaccinationRecord" format="csv" />
                <livewire:excel-export model="ManageVaccinationRecord" format="xlsx" />
                <livewire:excel-export model="ManageVaccinationRecord" format="pdf" />
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
                            {{ trans('cruds.manageVaccinationRecord.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.shelter') }}
                            @include('components.table.sort', ['field' => 'shelter.name'])
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.vaccine_against') }}
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.other_vaccination_against') }}
                            @include('components.table.sort', ['field' => 'other_vaccination_against'])
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.category_of_animals_vaccinated') }}
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.other_category') }}
                            @include('components.table.sort', ['field' => 'other_category'])
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.next_vac_date_month_yea_r') }}
                            @include('components.table.sort', ['field' => 'next_vac_date_month_yea_r'])
                        </th>
                        <th>
                            {{ trans('cruds.manageVaccinationRecord.fields.attending_officer') }}
                            @include('components.table.sort', ['field' => 'attending_officer'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($manageVaccinationRecords as $manageVaccinationRecord)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $manageVaccinationRecord->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $manageVaccinationRecord->id }}
                            </td>
                            <td>
                                {{ $manageVaccinationRecord->date }}
                            </td>
                            <td>
                                @if($manageVaccinationRecord->shelter)
                                    <span class="badge badge-relationship">{{ $manageVaccinationRecord->shelter->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($manageVaccinationRecord->vaccineAgainst as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $manageVaccinationRecord->other_vaccination_against }}
                            </td>
                            <td>
                                @foreach($manageVaccinationRecord->categoryOfAnimalsVaccinated as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $manageVaccinationRecord->other_category }}
                            </td>
                            <td>
                                {{ $manageVaccinationRecord->next_vac_date_month_yea_r }}
                            </td>
                            <td>
                                {{ $manageVaccinationRecord->attending_officer }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('manage_vaccination_record_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.manage-vaccination-records.show', $manageVaccinationRecord) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('manage_vaccination_record_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.manage-vaccination-records.edit', $manageVaccinationRecord) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('manage_vaccination_record_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $manageVaccinationRecord->id }})" wire:loading.attr="disabled">
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
            {{ $manageVaccinationRecords->links() }}
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