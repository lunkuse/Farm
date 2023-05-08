@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.harvestor.title_singular') }}:
                    {{ trans('cruds.harvestor.fields.id') }}
                    {{ $harvestor->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('harvestor.edit', [$harvestor])
        </div>
    </div>
</div>
@endsection