@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.manageEctoParasite.title_singular') }}:
                    {{ trans('cruds.manageEctoParasite.fields.id') }}
                    {{ $manageEctoParasite->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('manage-ecto-parasite.edit', [$manageEctoParasite])
        </div>
    </div>
</div>
@endsection