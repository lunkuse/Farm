@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.shelter.title_singular') }}:
                    {{ trans('cruds.shelter.fields.id') }}
                    {{ $shelter->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.shelter.fields.id') }}
                            </th>
                            <td>
                                {{ $shelter->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shelter.fields.block') }}
                            </th>
                            <td>
                                @if($shelter->block)
                                    <span class="badge badge-relationship">{{ $shelter->block->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shelter.fields.name') }}
                            </th>
                            <td>
                                {{ $shelter->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.shelter.fields.description') }}
                            </th>
                            <td>
                                {{ $shelter->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('shelter_edit')
                    <a href="{{ route('admin.shelters.edit', $shelter) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.shelters.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection