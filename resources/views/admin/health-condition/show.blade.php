@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.healthCondition.title_singular') }}:
                    {{ trans('cruds.healthCondition.fields.id') }}
                    {{ $healthCondition->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.healthCondition.fields.id') }}
                            </th>
                            <td>
                                {{ $healthCondition->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.healthCondition.fields.title') }}
                            </th>
                            <td>
                                {{ $healthCondition->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.healthCondition.fields.description') }}
                            </th>
                            <td>
                                {{ $healthCondition->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('health_condition_edit')
                    <a href="{{ route('admin.health-conditions.edit', $healthCondition) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.health-conditions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection