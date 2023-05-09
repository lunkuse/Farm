@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.acaricideUsed.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('acaricide_used_create')
                    <a class="btn btn-indigo" href="{{ route('admin.acaricide-useds.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.acaricideUsed.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('acaricide-used.index')

    </div>
</div>
@endsection