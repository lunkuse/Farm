@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.deliveryNature.title_singular') }}:
                    {{ trans('cruds.deliveryNature.fields.id') }}
                    {{ $deliveryNature->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('delivery-nature.edit', [$deliveryNature])
        </div>
    </div>
</div>
@endsection