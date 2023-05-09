@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.manageEctoParasite.title_singular') }}:
                    {{ trans('cruds.manageEctoParasite.fields.id') }}
                    {{ $manageEctoParasite->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.id') }}
                            </th>
                            <td>
                                {{ $manageEctoParasite->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.block') }}
                            </th>
                            <td>
                                @foreach($manageEctoParasite->block as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.date') }}
                            </th>
                            <td>
                                {{ $manageEctoParasite->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.acaricide_used') }}
                            </th>
                            <td>
                                @foreach($manageEctoParasite->acaricideUsed as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.other_acaricide') }}
                            </th>
                            <td>
                                {{ $manageEctoParasite->other_acaricide }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.time_of_spray') }}
                            </th>
                            <td>
                                {{ $manageEctoParasite->time_of_spray }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.next_spray_date') }}
                            </th>
                            <td>
                                {{ $manageEctoParasite->next_spray_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.comments') }}
                            </th>
                            <td>
                                {{ $manageEctoParasite->comments }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageEctoParasite.fields.attending_officer') }}
                            </th>
                            <td>
                                {{ $manageEctoParasite->attending_officer }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('manage_ecto_parasite_edit')
                    <a href="{{ route('admin.manage-ecto-parasites.edit', $manageEctoParasite) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.manage-ecto-parasites.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection