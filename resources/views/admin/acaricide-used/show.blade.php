@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.acaricideUsed.title_singular') }}:
                    {{ trans('cruds.acaricideUsed.fields.id') }}
                    {{ $acaricideUsed->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.acaricideUsed.fields.id') }}
                            </th>
                            <td>
                                {{ $acaricideUsed->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.acaricideUsed.fields.name') }}
                            </th>
                            <td>
                                {{ $acaricideUsed->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.acaricideUsed.fields.description') }}
                            </th>
                            <td>
                                {{ $acaricideUsed->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('acaricide_used_edit')
                    <a href="{{ route('admin.acaricide-useds.edit', $acaricideUsed) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.acaricide-useds.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection