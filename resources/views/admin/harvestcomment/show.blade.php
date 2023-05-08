@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.harvestcomment.title_singular') }}:
                    {{ trans('cruds.harvestcomment.fields.id') }}
                    {{ $harvestcomment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.harvestcomment.fields.id') }}
                            </th>
                            <td>
                                {{ $harvestcomment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.harvestcomment.fields.title') }}
                            </th>
                            <td>
                                {{ $harvestcomment->title }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('harvestcomment_edit')
                    <a href="{{ route('admin.harvestcomments.edit', $harvestcomment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.harvestcomments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection