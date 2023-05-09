@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.currentDiagnosi.title_singular') }}:
                    {{ trans('cruds.currentDiagnosi.fields.id') }}
                    {{ $currentDiagnosi->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('current-diagnosi.edit', [$currentDiagnosi])
        </div>
    </div>
</div>
@endsection