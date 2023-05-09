@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.fruitType.title_singular') }}:
                    {{ trans('cruds.fruitType.fields.id') }}
                    {{ $fruitType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.fruitType.fields.id') }}
                            </th>
                            <td>
                                {{ $fruitType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.fruitType.fields.name') }}
                            </th>
                            <td>
                                {{ $fruitType->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.fruitType.fields.description') }}
                            </th>
                            <td>
                                {{ $fruitType->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('fruit_type_edit')
                    <a href="{{ route('admin.fruit-types.edit', $fruitType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.fruit-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection