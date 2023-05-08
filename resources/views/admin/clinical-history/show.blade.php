@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.clinicalHistory.title_singular') }}:
                    {{ trans('cruds.clinicalHistory.fields.id') }}
                    {{ $clinicalHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.clinicalHistory.fields.id') }}
                            </th>
                            <td>
                                {{ $clinicalHistory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.clinicalHistory.fields.name') }}
                            </th>
                            <td>
                                {{ $clinicalHistory->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.clinicalHistory.fields.description') }}
                            </th>
                            <td>
                                {{ $clinicalHistory->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('clinical_history_edit')
                    <a href="{{ route('admin.clinical-histories.edit', $clinicalHistory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.clinical-histories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection