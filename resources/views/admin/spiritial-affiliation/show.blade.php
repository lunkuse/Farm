@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.spiritialAffiliation.title_singular') }}:
                    {{ trans('cruds.spiritialAffiliation.fields.id') }}
                    {{ $spiritialAffiliation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.spiritialAffiliation.fields.id') }}
                            </th>
                            <td>
                                {{ $spiritialAffiliation->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.spiritialAffiliation.fields.title') }}
                            </th>
                            <td>
                                {{ $spiritialAffiliation->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.spiritialAffiliation.fields.description') }}
                            </th>
                            <td>
                                {{ $spiritialAffiliation->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('spiritial_affiliation_edit')
                    <a href="{{ route('admin.spiritial-affiliations.edit', $spiritialAffiliation) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.spiritial-affiliations.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection