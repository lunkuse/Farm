@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.harvestcomment.title_singular') }}:
                    {{ trans('cruds.harvestcomment.fields.id') }}
                    {{ $harvestcomment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('harvestcomment.edit', [$harvestcomment])
        </div>
    </div>
</div>
@endsection