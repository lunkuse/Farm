@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.manageHealthRecord.title_singular') }}:
                    {{ trans('cruds.manageHealthRecord.fields.id') }}
                    {{ $manageHealthRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $manageHealthRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.date') }}
                            </th>
                            <td>
                                {{ $manageHealthRecord->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.tag_no') }}
                            </th>
                            <td>
                                @if($manageHealthRecord->tagNo)
                                    <span class="badge badge-relationship">{{ $manageHealthRecord->tagNo->tag_no ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.clinical_history') }}
                            </th>
                            <td>
                                @foreach($manageHealthRecord->clinicalHistory as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.other_clinical_history') }}
                            </th>
                            <td>
                                {{ $manageHealthRecord->other_clinical_history }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.current_diagnosis') }}
                            </th>
                            <td>
                                @foreach($manageHealthRecord->currentDiagnosis as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.other_current_diagnosis') }}
                            </th>
                            <td>
                                {{ $manageHealthRecord->other_current_diagnosis }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.treatment_administered') }}
                            </th>
                            <td>
                                @foreach($manageHealthRecord->treatmentAdministered as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.other_treatment_administered') }}
                            </th>
                            <td>
                                {{ $manageHealthRecord->other_treatment_administered }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.attending_officer') }}
                            </th>
                            <td>
                                {{ $manageHealthRecord->attending_officer }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.comments') }}
                            </th>
                            <td>
                                {{ $manageHealthRecord->comments }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageHealthRecord.fields.stock_attendant') }}
                            </th>
                            <td>
                                @if($manageHealthRecord->stockAttendant)
                                    <span class="badge badge-relationship">{{ $manageHealthRecord->stockAttendant->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('manage_health_record_edit')
                    <a href="{{ route('admin.manage-health-records.edit', $manageHealthRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.manage-health-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection