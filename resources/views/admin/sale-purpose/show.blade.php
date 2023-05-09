@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.salePurpose.title_singular') }}:
                    {{ trans('cruds.salePurpose.fields.id') }}
                    {{ $salePurpose->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.salePurpose.fields.id') }}
                            </th>
                            <td>
                                {{ $salePurpose->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.salePurpose.fields.purpose') }}
                            </th>
                            <td>
                                {{ $salePurpose->purpose }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.salePurpose.fields.description') }}
                            </th>
                            <td>
                                {{ $salePurpose->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('sale_purpose_edit')
                    <a href="{{ route('admin.sale-purposes.edit', $salePurpose) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.sale-purposes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection