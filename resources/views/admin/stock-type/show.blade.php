@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.stockType.title_singular') }}:
                    {{ trans('cruds.stockType.fields.id') }}
                    {{ $stockType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.stockType.fields.id') }}
                            </th>
                            <td>
                                {{ $stockType->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stockType.fields.title') }}
                            </th>
                            <td>
                                {{ $stockType->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stockType.fields.description') }}
                            </th>
                            <td>
                                {{ $stockType->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('stock_type_edit')
                    <a href="{{ route('admin.stock-types.edit', $stockType) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.stock-types.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection