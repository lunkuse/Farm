@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.vaccineAgainst.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('vaccine_against_create')
                    <a class="btn btn-indigo" href="{{ route('admin.vaccine-againsts.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.vaccineAgainst.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('vaccine-against.index')

    </div>
</div>
@endsection