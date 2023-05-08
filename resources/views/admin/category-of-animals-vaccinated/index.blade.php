@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.categoryOfAnimalsVaccinated.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('category_of_animals_vaccinated_create')
                    <a class="btn btn-indigo" href="{{ route('admin.category-of-animals-vaccinateds.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.categoryOfAnimalsVaccinated.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('category-of-animals-vaccinated.index')

    </div>
</div>
@endsection