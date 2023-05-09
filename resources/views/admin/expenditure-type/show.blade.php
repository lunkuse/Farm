@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.expenditureType.title_singular') }}:
                    {{ trans('cruds.expenditureType.fields.id') }}
                    {{ $expenditureType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.expenditureType.fields.id') }}
                            </th>
                            <td>
                                {{ $expenditureType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expenditureType.fields.type') }}
                            </th>
                            <td>
                                {{ $expenditureType->type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.expenditureType.fields.description') }}
                            </th>
                            <td>
                                {{ $expenditureType->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('expenditure_type_edit')
                    <a href="{{ route('admin.expenditure-types.edit', $expenditureType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.expenditure-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection