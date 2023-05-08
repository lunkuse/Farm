@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.gender.title_singular') }}:
                    {{ trans('cruds.gender.fields.id') }}
                    {{ $gender->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.gender.fields.id') }}
                            </th>
                            <td>
                                {{ $gender->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gender.fields.name') }}
                            </th>
                            <td>
                                {{ $gender->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.gender.fields.description') }}
                            </th>
                            <td>
                                {{ $gender->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('gender_edit')
                    <a href="{{ route('admin.genders.edit', $gender) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.genders.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection