@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.staffPaymentRecord.title_singular') }}:
                    {{ trans('cruds.staffPaymentRecord.fields.id') }}
                    {{ $staffPaymentRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('staff-payment-record.edit', [$staffPaymentRecord])
        </div>
    </div>
</div>
@endsection