@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.expenditureType.title_singular') }}:
                    {{ trans('cruds.expenditureType.fields.id') }}
                    {{ $expenditureType->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('expenditure-type.edit', [$expenditureType])
        </div>
    </div>
</div>
@endsection