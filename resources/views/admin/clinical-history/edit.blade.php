@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.clinicalHistory.title_singular') }}:
                    {{ trans('cruds.clinicalHistory.fields.id') }}
                    {{ $clinicalHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('clinical-history.edit', [$clinicalHistory])
        </div>
    </div>
</div>
@endsection