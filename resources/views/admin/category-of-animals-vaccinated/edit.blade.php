@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.categoryOfAnimalsVaccinated.title_singular') }}:
                    {{ trans('cruds.categoryOfAnimalsVaccinated.fields.id') }}
                    {{ $categoryOfAnimalsVaccinated->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('category-of-animals-vaccinated.edit', [$categoryOfAnimalsVaccinated])
        </div>
    </div>
</div>
@endsection