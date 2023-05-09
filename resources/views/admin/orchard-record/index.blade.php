@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.orchardRecord.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('orchard_record_create')
                    <a class="btn btn-indigo" href="{{ route('admin.orchard-records.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.orchardRecord.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('orchard-record.index')

    </div>
</div>
@endsection