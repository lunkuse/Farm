@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.manageExpense.title_singular') }}:
                    {{ trans('cruds.manageExpense.fields.id') }}
                    {{ $manageExpense->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.manageExpense.fields.id') }}
                            </th>
                            <td>
                                {{ $manageExpense->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageExpense.fields.date') }}
                            </th>
                            <td>
                                {{ $manageExpense->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageExpense.fields.expenditure_type') }}
                            </th>
                            <td>
                                @if($manageExpense->expenditureType)
                                    <span class="badge badge-relationship">{{ $manageExpense->expenditureType->type ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageExpense.fields.quantity') }}
                            </th>
                            <td>
                                {{ $manageExpense->quantity }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageExpense.fields.amount') }}
                            </th>
                            <td>
                                {{ $manageExpense->amount }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageExpense.fields.comments') }}
                            </th>
                            <td>
                                {{ $manageExpense->comments }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageExpense.fields.attendant') }}
                            </th>
                            <td>
                                @if($manageExpense->attendant)
                                    <span class="badge badge-relationship">{{ $manageExpense->attendant->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('manage_expense_edit')
                    <a href="{{ route('admin.manage-expenses.edit', $manageExpense) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.manage-expenses.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection