<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManageStaffRecordRequest;
use App\Http\Requests\UpdateManageStaffRecordRequest;
use App\Http\Resources\Admin\ManageStaffRecordResource;
use App\Models\ManageStaffRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageStaffRecordApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_staff_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageStaffRecordResource(ManageStaffRecord::with(['staffName', 'role', 'paymentRecord', 'staffPerfomance', 'recommendation'])->get());
    }

    public function store(StoreManageStaffRecordRequest $request)
    {
        $manageStaffRecord = ManageStaffRecord::create($request->validated());
        $manageStaffRecord->role()->sync($request->input('role', []));
        $manageStaffRecord->recommendation()->sync($request->input('recommendation', []));

        return (new ManageStaffRecordResource($manageStaffRecord))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManageStaffRecord $manageStaffRecord)
    {
        abort_if(Gate::denies('manage_staff_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageStaffRecordResource($manageStaffRecord->load(['staffName', 'role', 'paymentRecord', 'staffPerfomance', 'recommendation']));
    }

    public function update(UpdateManageStaffRecordRequest $request, ManageStaffRecord $manageStaffRecord)
    {
        $manageStaffRecord->update($request->validated());
        $manageStaffRecord->role()->sync($request->input('role', []));
        $manageStaffRecord->recommendation()->sync($request->input('recommendation', []));

        return (new ManageStaffRecordResource($manageStaffRecord))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManageStaffRecord $manageStaffRecord)
    {
        abort_if(Gate::denies('manage_staff_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageStaffRecord->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
