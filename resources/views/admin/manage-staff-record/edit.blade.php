@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.manageStaffRecord.title_singular') }}:
                    {{ trans('cruds.manageStaffRecord.fields.id') }}
                    {{ $manageStaffRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('manage-staff-record.edit', [$manageStaffRecord])
        </div>
    </div>
</div>
@endsection