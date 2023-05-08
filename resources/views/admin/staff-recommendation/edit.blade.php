@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.staffRecommendation.title_singular') }}:
                    {{ trans('cruds.staffRecommendation.fields.id') }}
                    {{ $staffRecommendation->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('staff-recommendation.edit', [$staffRecommendation])
        </div>
    </div>
</div>
@endsection