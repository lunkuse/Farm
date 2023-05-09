@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.skill.title_singular') }}:
                    {{ trans('cruds.skill.fields.id') }}
                    {{ $skill->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('skill.edit', [$skill])
        </div>
    </div>
</div>
@endsection