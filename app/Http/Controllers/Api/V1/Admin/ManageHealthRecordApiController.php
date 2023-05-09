<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManageHealthRecordRequest;
use App\Http\Requests\UpdateManageHealthRecordRequest;
use App\Http\Resources\Admin\ManageHealthRecordResource;
use App\Models\ManageHealthRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageHealthRecordApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_health_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageHealthRecordResource(ManageHealthRecord::with(['tagNo', 'clinicalHistory', 'currentDiagnosis', 'treatmentAdministered', 'stockAttendant'])->get());
    }

    public function store(StoreManageHealthRecordRequest $request)
    {
        $manageHealthRecord = ManageHealthRecord::create($request->validated());
        $manageHealthRecord->clinicalHistory()->sync($request->input('clinicalHistory', []));
        $manageHealthRecord->currentDiagnosis()->sync($request->input('currentDiagnosis', []));
        $manageHealthRecord->treatmentAdministered()->sync($request->input('treatmentAdministered', []));

        return (new ManageHealthRecordResource($manageHealthRecord))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManageHealthRecord $manageHealthRecord)
    {
        abort_if(Gate::denies('manage_health_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageHealthRecordResource($manageHealthRecord->load(['tagNo', 'clinicalHistory', 'currentDiagnosis', 'treatmentAdministered', 'stockAttendant']));
    }

    public function update(UpdateManageHealthRecordRequest $request, ManageHealthRecord $manageHealthRecord)
    {
        $manageHealthRecord->update($request->validated());
        $manageHealthRecord->clinicalHistory()->sync($request->input('clinicalHistory', []));
        $manageHealthRecord->currentDiagnosis()->sync($request->input('currentDiagnosis', []));
        $manageHealthRecord->treatmentAdministered()->sync($request->input('treatmentAdministered', []));

        return (new ManageHealthRecordResource($manageHealthRecord))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManageHealthRecord $manageHealthRecord)
    {
        abort_if(Gate::denies('manage_health_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageHealthRecord->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
