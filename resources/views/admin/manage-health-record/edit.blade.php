@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.manageHealthRecord.title_singular') }}:
                    {{ trans('cruds.manageHealthRecord.fields.id') }}
                    {{ $manageHealthRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('manage-health-record.edit', [$manageHealthRecord])
        </div>
    </div>
</div>
@endsection