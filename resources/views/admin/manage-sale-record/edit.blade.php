@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.manageSaleRecord.title_singular') }}:
                    {{ trans('cruds.manageSaleRecord.fields.id') }}
                    {{ $manageSaleRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('manage-sale-record.edit', [$manageSaleRecord])
        </div>
    </div>
</div>
@endsection