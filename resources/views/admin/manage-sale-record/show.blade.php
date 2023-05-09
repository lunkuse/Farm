@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.manageSaleRecord.title_singular') }}:
                    {{ trans('cruds.manageSaleRecord.fields.id') }}
                    {{ $manageSaleRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.manageSaleRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $manageSaleRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageSaleRecord.fields.date') }}
                            </th>
                            <td>
                                {{ $manageSaleRecord->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageSaleRecord.fields.animal_tag') }}
                            </th>
                            <td>
                                @foreach($manageSaleRecord->animalTag as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->tag_no }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageSaleRecord.fields.quantity') }}
                            </th>
                            <td>
                                {{ $manageSaleRecord->quantity }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageSaleRecord.fields.amount') }}
                            </th>
                            <td>
                                {{ $manageSaleRecord->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageSaleRecord.fields.sale_purpose') }}
                            </th>
                            <td>
                                @foreach($manageSaleRecord->salePurpose as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->purpose }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('manage_sale_record_edit')
                    <a href="{{ route('admin.manage-sale-records.edit', $manageSaleRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.manage-sale-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection