@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.breed.title_singular') }}:
                    {{ trans('cruds.breed.fields.id') }}
                    {{ $breed->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.breed.fields.id') }}
                            </th>
                            <td>
                                {{ $breed->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.breed.fields.name') }}
                            </th>
                            <td>
                                {{ $breed->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.breed.fields.description') }}
                            </th>
                            <td>
                                {{ $breed->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('breed_edit')
                    <a href="{{ route('admin.breeds.edit', $breed) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.breeds.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection