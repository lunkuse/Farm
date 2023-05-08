@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.generalStockRecord.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('general_stock_record_create')
                    <a class="btn btn-indigo" href="{{ route('admin.general-stock-records.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.generalStockRecord.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('general-stock-record.index')

    </div>
</div>
@endsection