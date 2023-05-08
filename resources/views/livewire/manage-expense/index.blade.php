<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('manage_expense_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ManageExpense" format="csv" />
                <livewire:excel-export model="ManageExpense" format="xlsx" />
                <livewire:excel-export model="ManageExpense" format="pdf" />
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
                            {{ trans('cruds.manageExpense.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.manageExpense.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.manageExpense.fields.expenditure_type') }}
                            @include('components.table.sort', ['field' => 'expenditure_type.type'])
                        </th>
                        <th>
                            {{ trans('cruds.manageExpense.fields.quantity') }}
                            @include('components.table.sort', ['field' => 'quantity'])
                        </th>
                        <th>
                            {{ trans('cruds.manageExpense.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                            {{ trans('cruds.manageExpense.fields.comments') }}
                            @include('components.table.sort', ['field' => 'comments'])
                        </th>
                        <th>
                            {{ trans('cruds.manageExpense.fields.attendant') }}
                            @include('components.table.sort', ['field' => 'attendant.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                            @include('components.table.sort', ['field' => 'attendant.email'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($manageExpenses as $manageExpense)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $manageExpense->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $manageExpense->id }}
                            </td>
                            <td>
                                {{ $manageExpense->date }}
                            </td>
                            <td>
                                @if($manageExpense->expenditureType)
                                    <span class="badge badge-relationship">{{ $manageExpense->expenditureType->type ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $manageExpense->quantity }}
                            </td>
                            <td>
                                {{ $manageExpense->amount }}
                            </td>
                            <td>
                                {{ $manageExpense->comments }}
                            </td>
                            <td>
                                @if($manageExpense->attendant)
                                    <span class="badge badge-relationship">{{ $manageExpense->attendant->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($manageExpense->attendant)
                                    <a class="link-light-blue" href="mailto:{{ $manageExpense->attendant->email ?? '' }}">
                                        <i class="far fa-envelope fa-fw">
                                        </i>
                                        {{ $manageExpense->attendant->email ?? '' }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('manage_expense_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.manage-expenses.show', $manageExpense) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('manage_expense_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.manage-expenses.edit', $manageExpense) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('manage_expense_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $manageExpense->id }})" wire:loading.attr="disabled">
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
            {{ $manageExpenses->links() }}
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