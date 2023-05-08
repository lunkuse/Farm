@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.manageStaffRecord.title_singular') }}:
                    {{ trans('cruds.manageStaffRecord.fields.id') }}
                    {{ $manageStaffRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $manageStaffRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.staff_name') }}
                            </th>
                            <td>
                                @if($manageStaffRecord->staffName)
                                    <span class="badge badge-relationship">{{ $manageStaffRecord->staffName->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.role') }}
                            </th>
                            <td>
                                @foreach($manageStaffRecord->role as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.wage') }}
                            </th>
                            <td>
                                {{ $manageStaffRecord->wage }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.payment_record') }}
                            </th>
                            <td>
                                @if($manageStaffRecord->paymentRecord)
                                    <span class="badge badge-relationship">{{ $manageStaffRecord->paymentRecord->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.month_year') }}
                            </th>
                            <td>
                                {{ $manageStaffRecord->month_year }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.staff_perfomance') }}
                            </th>
                            <td>
                                @if($manageStaffRecord->staffPerfomance)
                                    <span class="badge badge-relationship">{{ $manageStaffRecord->staffPerfomance->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageStaffRecord.fields.recommendation') }}
                            </th>
                            <td>
                                @foreach($manageStaffRecord->recommendation as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('manage_staff_record_edit')
                    <a href="{{ route('admin.manage-staff-records.edit', $manageStaffRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.manage-staff-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection