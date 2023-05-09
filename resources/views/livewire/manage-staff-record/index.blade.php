<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('manage_staff_record_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ManageStaffRecord" format="csv" />
                <livewire:excel-export model="ManageStaffRecord" format="xlsx" />
                <livewire:excel-export model="ManageStaffRecord" format="pdf" />
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
                            {{ trans('cruds.manageStaffRecord.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.manageStaffRecord.fields.staff_name') }}
                            @include('components.table.sort', ['field' => 'staff_name.name'])
                        </th>
                        <th>
                            {{ trans('cruds.manageStaffRecord.fields.role') }}
                        </th>
                        <th>
                            {{ trans('cruds.manageStaffRecord.fields.wage') }}
                            @include('components.table.sort', ['field' => 'wage'])
                        </th>
                        <th>
                            {{ trans('cruds.manageStaffRecord.fields.payment_record') }}
                            @include('components.table.sort', ['field' => 'payment_record.name'])
                        </th>
                        <th>
                            {{ trans('cruds.manageStaffRecord.fields.month_year') }}
                            @include('components.table.sort', ['field' => 'month_year'])
                        </th>
                        <th>
                            {{ trans('cruds.manageStaffRecord.fields.staff_perfomance') }}
                            @include('components.table.sort', ['field' => 'staff_perfomance.name'])
                        </th>
                        <th>
                            {{ trans('cruds.manageStaffRecord.fields.recommendation') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($manageStaffRecords as $manageStaffRecord)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $manageStaffRecord->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $manageStaffRecord->id }}
                            </td>
                            <td>
                                @if($manageStaffRecord->staffName)
                                    <span class="badge badge-relationship">{{ $manageStaffRecord->staffName->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($manageStaffRecord->role as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $manageStaffRecord->wage }}
                            </td>
                            <td>
                                @if($manageStaffRecord->paymentRecord)
                                    <span class="badge badge-relationship">{{ $manageStaffRecord->paymentRecord->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $manageStaffRecord->month_year }}
                            </td>
                            <td>
                                @if($manageStaffRecord->staffPerfomance)
                                    <span class="badge badge-relationship">{{ $manageStaffRecord->staffPerfomance->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @foreach($manageStaffRecord->recommendation as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('manage_staff_record_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.manage-staff-records.show', $manageStaffRecord) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('manage_staff_record_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.manage-staff-records.edit', $manageStaffRecord) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('manage_staff_record_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $manageStaffRecord->id }})" wire:loading.attr="disabled">
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
            {{ $manageStaffRecords->links() }}
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