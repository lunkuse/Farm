@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.kidNumber.title_singular') }}:
                    {{ trans('cruds.kidNumber.fields.id') }}
                    {{ $kidNumber->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('kid-number.edit', [$kidNumber])
        </div>
    </div>
</div>
@endsection