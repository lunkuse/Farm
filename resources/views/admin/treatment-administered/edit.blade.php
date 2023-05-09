@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.treatmentAdministered.title_singular') }}:
                    {{ trans('cruds.treatmentAdministered.fields.id') }}
                    {{ $treatmentAdministered->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('treatment-administered.edit', [$treatmentAdministered])
        </div>
    </div>
</div>
@endsection