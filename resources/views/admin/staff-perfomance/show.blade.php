@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.staffPerfomance.title_singular') }}:
                    {{ trans('cruds.staffPerfomance.fields.id') }}
                    {{ $staffPerfomance->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.staffPerfomance.fields.id') }}
                            </th>
                            <td>
                                {{ $staffPerfomance->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staffPerfomance.fields.name') }}
                            </th>
                            <td>
                                {{ $staffPerfomance->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staffPerfomance.fields.description') }}
                            </th>
                            <td>
                                {{ $staffPerfomance->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('staff_perfomance_edit')
                    <a href="{{ route('admin.staff-perfomances.edit', $staffPerfomance) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.staff-perfomances.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection