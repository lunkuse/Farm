@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.staffPaymentRecord.title_singular') }}:
                    {{ trans('cruds.staffPaymentRecord.fields.id') }}
                    {{ $staffPaymentRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.staffPaymentRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $staffPaymentRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staffPaymentRecord.fields.name') }}
                            </th>
                            <td>
                                {{ $staffPaymentRecord->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.staffPaymentRecord.fields.description') }}
                            </th>
                            <td>
                                {{ $staffPaymentRecord->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('staff_payment_record_edit')
                    <a href="{{ route('admin.staff-payment-records.edit', $staffPaymentRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.staff-payment-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection