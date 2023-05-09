@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.treatmentAdministered.title_singular') }}:
                    {{ trans('cruds.treatmentAdministered.fields.id') }}
                    {{ $treatmentAdministered->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.treatmentAdministered.fields.id') }}
                            </th>
                            <td>
                                {{ $treatmentAdministered->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.treatmentAdministered.fields.name') }}
                            </th>
                            <td>
                                {{ $treatmentAdministered->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.treatmentAdministered.fields.description') }}
                            </th>
                            <td>
                                {{ $treatmentAdministered->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('treatment_administered_edit')
                    <a href="{{ route('admin.treatment-administereds.edit', $treatmentAdministered) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.treatment-administereds.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection