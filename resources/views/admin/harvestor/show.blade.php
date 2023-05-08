@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.harvestor.title_singular') }}:
                    {{ trans('cruds.harvestor.fields.id') }}
                    {{ $harvestor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.harvestor.fields.id') }}
                            </th>
                            <td>
                                {{ $harvestor->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.harvestor.fields.title') }}
                            </th>
                            <td>
                                {{ $harvestor->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.harvestor.fields.description') }}
                            </th>
                            <td>
                                {{ $harvestor->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('harvestor_edit')
                    <a href="{{ route('admin.harvestors.edit', $harvestor) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.harvestors.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection