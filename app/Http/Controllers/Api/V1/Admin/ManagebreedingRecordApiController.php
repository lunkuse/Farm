<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManagebreedingRecordRequest;
use App\Http\Requests\UpdateManagebreedingRecordRequest;
use App\Http\Resources\Admin\ManagebreedingRecordResource;
use App\Models\ManagebreedingRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManagebreedingRecordApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('managebreeding_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManagebreedingRecordResource(ManagebreedingRecord::with(['nannyTagNo', 'buckTagNo', 'animalType', 'deliveryNature', 'kidsNumber', 'kidSex', 'breedingComments', 'tag'])->get());
    }

    public function store(StoreManagebreedingRecordRequest $request)
    {
        $managebreedingRecord = ManagebreedingRecord::create($request->validated());
        $managebreedingRecord->kidSex()->sync($request->input('kidSex', []));
        $managebreedingRecord->breedingComments()->sync($request->input('breedingComments', []));
        $managebreedingRecord->tag()->sync($request->input('tag', []));

        return (new ManagebreedingRecordResource($managebreedingRecord))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManagebreedingRecord $managebreedingRecord)
    {
        abort_if(Gate::denies('managebreeding_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManagebreedingRecordResource($managebreedingRecord->load(['nannyTagNo', 'buckTagNo', 'animalType', 'deliveryNature', 'kidsNumber', 'kidSex', 'breedingComments', 'tag']));
    }

    public function update(UpdateManagebreedingRecordRequest $request, ManagebreedingRecord $managebreedingRecord)
    {
        $managebreedingRecord->update($request->validated());
        $managebreedingRecord->kidSex()->sync($request->input('kidSex', []));
        $managebreedingRecord->breedingComments()->sync($request->input('breedingComments', []));
        $managebreedingRecord->tag()->sync($request->input('tag', []));

        return (new ManagebreedingRecordResource($managebreedingRecord))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManagebreedingRecord $managebreedingRecord)
    {
        abort_if(Gate::denies('managebreeding_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managebreedingRecord->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
