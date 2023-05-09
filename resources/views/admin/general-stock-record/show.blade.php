@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.generalStockRecord.title_singular') }}:
                    {{ trans('cruds.generalStockRecord.fields.id') }}
                    {{ $generalStockRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.date') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.shelter') }}
                            </th>
                            <td>
                                @if($generalStockRecord->shelter)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->shelter->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.animal_type') }}
                            </th>
                            <td>
                                @if($generalStockRecord->animalType)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->animalType->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.other_animal_type') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->other_animal_type }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.tag_no') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->tag_no }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.breed') }}
                            </th>
                            <td>
                                @if($generalStockRecord->breed)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->breed->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.other_breed') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->other_breed }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.gender') }}
                            </th>
                            <td>
                                @if($generalStockRecord->gender)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->gender->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.dob') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->dob }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.age') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->age }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.color') }}
                            </th>
                            <td>
                                @if($generalStockRecord->color)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->color->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.other_color') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->other_color }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.source') }}
                            </th>
                            <td>
                                @if($generalStockRecord->source)
                                    <span class="badge badge-relationship">{{ $generalStockRecord->source->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.other_source') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->other_source }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.comments') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->comments }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.generalStockRecord.fields.availability') }}
                            </th>
                            <td>
                                {{ $generalStockRecord->availability_label }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('general_stock_record_edit')
                    <a href="{{ route('admin.general-stock-records.edit', $generalStockRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.general-stock-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection