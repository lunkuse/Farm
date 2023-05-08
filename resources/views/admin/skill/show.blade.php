@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.skill.title_singular') }}:
                    {{ trans('cruds.skill.fields.id') }}
                    {{ $skill->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.skill.fields.id') }}
                            </th>
                            <td>
                                {{ $skill->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.skill.fields.title') }}
                            </th>
                            <td>
                                {{ $skill->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.skill.fields.description') }}
                            </th>
                            <td>
                                {{ $skill->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('skill_edit')
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection