@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.source.title_singular') }}:
                    {{ trans('cruds.source.fields.id') }}
                    {{ $source->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('source.edit', [$source])
        </div>
    </div>
</div>
@endsection