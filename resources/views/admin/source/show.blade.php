@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.source.title_singular') }}:
                    {{ trans('cruds.source.fields.id') }}
                    {{ $source->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.source.fields.id') }}
                            </th>
                            <td>
                                {{ $source->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.source.fields.name') }}
                            </th>
                            <td>
                                {{ $source->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.source.fields.description') }}
                            </th>
                            <td>
                                {{ $source->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('source_edit')
                    <a href="{{ route('admin.sources.edit', $source) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.sources.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection