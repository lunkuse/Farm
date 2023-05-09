@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.currentDiagnosi.title_singular') }}:
                    {{ trans('cruds.currentDiagnosi.fields.id') }}
                    {{ $currentDiagnosi->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.currentDiagnosi.fields.id') }}
                            </th>
                            <td>
                                {{ $currentDiagnosi->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.currentDiagnosi.fields.name') }}
                            </th>
                            <td>
                                {{ $currentDiagnosi->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.currentDiagnosi.fields.description') }}
                            </th>
                            <td>
                                {{ $currentDiagnosi->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('current_diagnosi_edit')
                    <a href="{{ route('admin.current-diagnosis.edit', $currentDiagnosi) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.current-diagnosis.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection