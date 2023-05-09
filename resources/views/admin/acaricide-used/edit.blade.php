@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.acaricideUsed.title_singular') }}:
                    {{ trans('cruds.acaricideUsed.fields.id') }}
                    {{ $acaricideUsed->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('acaricide-used.edit', [$acaricideUsed])
        </div>
    </div>
</div>
@endsection