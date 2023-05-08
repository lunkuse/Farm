@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.orchardRecord.title_singular') }}:
                    {{ trans('cruds.orchardRecord.fields.id') }}
                    {{ $orchardRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $orchardRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.date') }}
                            </th>
                            <td>
                                {{ $orchardRecord->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.fruit_type') }}
                            </th>
                            <td>
                                @if($orchardRecord->fruitType)
                                    <span class="badge badge-relationship">{{ $orchardRecord->fruitType->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.fruits_harvested') }}
                            </th>
                            <td>
                                {{ $orchardRecord->fruits_harvested }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.fruits_cleaned') }}
                            </th>
                            <td>
                                {{ $orchardRecord->fruits_cleaned }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.fruits_sorted_out') }}
                            </th>
                            <td>
                                {{ $orchardRecord->fruits_sorted_out }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.fruits_eaten') }}
                            </th>
                            <td>
                                {{ $orchardRecord->fruits_eaten }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.harvestors') }}
                            </th>
                            <td>
                                @foreach($orchardRecord->harvestors as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.comments') }}
                            </th>
                            <td>
                                @foreach($orchardRecord->comments as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.orchardRecord.fields.recording_officer') }}
                            </th>
                            <td>
                                @if($orchardRecord->recordingOfficer)
                                    <span class="badge badge-relationship">{{ $orchardRecord->recordingOfficer->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('orchard_record_edit')
                    <a href="{{ route('admin.orchard-records.edit', $orchardRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.orchard-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection