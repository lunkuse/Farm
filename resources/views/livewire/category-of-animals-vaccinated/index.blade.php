<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('category_of_animals_vaccinated_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="CategoryOfAnimalsVaccinated" format="csv" />
                <livewire:excel-export model="CategoryOfAnimalsVaccinated" format="xlsx" />
                <livewire:excel-export model="CategoryOfAnimalsVaccinated" format="pdf" />
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
                            {{ trans('cruds.categoryOfAnimalsVaccinated.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.categoryOfAnimalsVaccinated.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.categoryOfAnimalsVaccinated.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categoryOfAnimalsVaccinateds as $categoryOfAnimalsVaccinated)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $categoryOfAnimalsVaccinated->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $categoryOfAnimalsVaccinated->id }}
                            </td>
                            <td>
                                {{ $categoryOfAnimalsVaccinated->name }}
                            </td>
                            <td>
                                {{ $categoryOfAnimalsVaccinated->description }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('category_of_animals_vaccinated_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.category-of-animals-vaccinateds.show', $categoryOfAnimalsVaccinated) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('category_of_animals_vaccinated_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.category-of-animals-vaccinateds.edit', $categoryOfAnimalsVaccinated) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('category_of_animals_vaccinated_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $categoryOfAnimalsVaccinated->id }})" wire:loading.attr="disabled">
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
            {{ $categoryOfAnimalsVaccinateds->links() }}
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