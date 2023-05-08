@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.categoryOfAnimalsVaccinated.title_singular') }}:
                    {{ trans('cruds.categoryOfAnimalsVaccinated.fields.id') }}
                    {{ $categoryOfAnimalsVaccinated->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.categoryOfAnimalsVaccinated.fields.id') }}
                            </th>
                            <td>
                                {{ $categoryOfAnimalsVaccinated->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.categoryOfAnimalsVaccinated.fields.name') }}
                            </th>
                            <td>
                                {{ $categoryOfAnimalsVaccinated->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.categoryOfAnimalsVaccinated.fields.description') }}
                            </th>
                            <td>
                                {{ $categoryOfAnimalsVaccinated->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('category_of_animals_vaccinated_edit')
                    <a href="{{ route('admin.category-of-animals-vaccinateds.edit', $categoryOfAnimalsVaccinated) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.category-of-animals-vaccinateds.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection