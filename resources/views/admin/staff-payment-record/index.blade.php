@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.staffPaymentRecord.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('staff_payment_record_create')
                    <a class="btn btn-indigo" href="{{ route('admin.staff-payment-records.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.staffPaymentRecord.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('staff-payment-record.index')

    </div>
</div>
@endsection