@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.manageVaccinationRecord.title_singular') }}:
                    {{ trans('cruds.manageVaccinationRecord.fields.id') }}
                    {{ $manageVaccinationRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $manageVaccinationRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.date') }}
                            </th>
                            <td>
                                {{ $manageVaccinationRecord->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.shelter') }}
                            </th>
                            <td>
                                @if($manageVaccinationRecord->shelter)
                                    <span class="badge badge-relationship">{{ $manageVaccinationRecord->shelter->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.vaccine_against') }}
                            </th>
                            <td>
                                @foreach($manageVaccinationRecord->vaccineAgainst as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.other_vaccination_against') }}
                            </th>
                            <td>
                                {{ $manageVaccinationRecord->other_vaccination_against }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.category_of_animals_vaccinated') }}
                            </th>
                            <td>
                                @foreach($manageVaccinationRecord->categoryOfAnimalsVaccinated as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.other_category') }}
                            </th>
                            <td>
                                {{ $manageVaccinationRecord->other_category }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.next_vac_date_month_yea_r') }}
                            </th>
                            <td>
                                {{ $manageVaccinationRecord->next_vac_date_month_yea_r }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.manageVaccinationRecord.fields.attending_officer') }}
                            </th>
                            <td>
                                {{ $manageVaccinationRecord->attending_officer }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('manage_vaccination_record_edit')
                    <a href="{{ route('admin.manage-vaccination-records.edit', $manageVaccinationRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.manage-vaccination-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection