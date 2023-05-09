@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.gender.title_singular') }}:
                    {{ trans('cruds.gender.fields.id') }}
                    {{ $gender->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('gender.edit', [$gender])
        </div>
    </div>
</div>
@endsection