@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.staffRecommendation.title_singular') }}:
                    {{ trans('cruds.staffRecommendation.fields.id') }}
                    {{ $staffRecommendation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.staffRecommendation.fields.id') }}
                            </th>
                            <td>
                                {{ $staffRecommendation->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staffRecommendation.fields.name') }}
                            </th>
                            <td>
                                {{ $staffRecommendation->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staffRecommendation.fields.description') }}
                            </th>
                            <td>
                                {{ $staffRecommendation->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('staff_recommendation_edit')
                    <a href="{{ route('admin.staff-recommendations.edit', $staffRecommendation) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.staff-recommendations.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection