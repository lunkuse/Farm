@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.breed.title_singular') }}:
                    {{ trans('cruds.breed.fields.id') }}
                    {{ $breed->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('breed.edit', [$breed])
        </div>
    </div>
</div>
@endsection