@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.kidNumber.title_singular') }}:
                    {{ trans('cruds.kidNumber.fields.id') }}
                    {{ $kidNumber->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.kidNumber.fields.id') }}
                            </th>
                            <td>
                                {{ $kidNumber->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kidNumber.fields.name') }}
                            </th>
                            <td>
                                {{ $kidNumber->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kidNumber.fields.number') }}
                            </th>
                            <td>
                                {{ $kidNumber->number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kidNumber.fields.description') }}
                            </th>
                            <td>
                                {{ $kidNumber->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('kid_number_edit')
                    <a href="{{ route('admin.kid-numbers.edit', $kidNumber) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.kid-numbers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection