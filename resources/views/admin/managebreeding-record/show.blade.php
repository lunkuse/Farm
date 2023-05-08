@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.managebreedingRecord.title_singular') }}:
                    {{ trans('cruds.managebreedingRecord.fields.id') }}
                    {{ $managebreedingRecord->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.id') }}
                            </th>
                            <td>
                                {{ $managebreedingRecord->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.nanny_tag_no') }}
                            </th>
                            <td>
                                @if($managebreedingRecord->nannyTagNo)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->nannyTagNo->tag_no ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.buck_tag_no') }}
                            </th>
                            <td>
                                @if($managebreedingRecord->buckTagNo)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->buckTagNo->tag_no ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.date') }}
                            </th>
                            <td>
                                {{ $managebreedingRecord->date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.animal_type') }}
                            </th>
                            <td>
                                @if($managebreedingRecord->animalType)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->animalType->title ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.delivery_nature') }}
                            </th>
                            <td>
                                @if($managebreedingRecord->deliveryNature)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->deliveryNature->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.kids_number') }}
                            </th>
                            <td>
                                @if($managebreedingRecord->kidsNumber)
                                    <span class="badge badge-relationship">{{ $managebreedingRecord->kidsNumber->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.kid_sex') }}
                            </th>
                            <td>
                                @foreach($managebreedingRecord->kidSex as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.breeding_comments') }}
                            </th>
                            <td>
                                @foreach($managebreedingRecord->breedingComments as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->comment }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.managebreedingRecord.fields.tag') }}
                            </th>
                            <td>
                                @foreach($managebreedingRecord->tag as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->tag_no }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('managebreeding_record_edit')
                    <a href="{{ route('admin.managebreeding-records.edit', $managebreedingRecord) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.managebreeding-records.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection