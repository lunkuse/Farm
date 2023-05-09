@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.deliveryNature.title_singular') }}:
                    {{ trans('cruds.deliveryNature.fields.id') }}
                    {{ $deliveryNature->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.deliveryNature.fields.id') }}
                            </th>
                            <td>
                                {{ $deliveryNature->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.deliveryNature.fields.name') }}
                            </th>
                            <td>
                                {{ $deliveryNature->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.deliveryNature.fields.description') }}
                            </th>
                            <td>
                                {{ $deliveryNature->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('delivery_nature_edit')
                    <a href="{{ route('admin.delivery-natures.edit', $deliveryNature) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.delivery-natures.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection