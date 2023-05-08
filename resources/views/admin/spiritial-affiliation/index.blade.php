@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.spiritialAffiliation.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('spiritial_affiliation_create')
                    <a class="btn btn-indigo" href="{{ route('admin.spiritial-affiliations.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.spiritialAffiliation.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('spiritial-affiliation.index')

    </div>
</div>
@endsection