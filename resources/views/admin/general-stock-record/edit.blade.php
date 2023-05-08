@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.generalStockRecord.title_singular') }}:
                    {{ trans('cruds.generalStockRecord.fields.id') }}
                    {{ $generalStockRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('general-stock-record.edit', [$generalStockRecord])
        </div>
    </div>
</div>
@endsection