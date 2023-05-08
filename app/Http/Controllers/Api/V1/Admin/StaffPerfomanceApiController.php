<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffPerfomanceRequest;
use App\Http\Requests\UpdateStaffPerfomanceRequest;
use App\Http\Resources\Admin\StaffPerfomanceResource;
use App\Models\StaffPerfomance;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffPerfomanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_perfomance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaffPerfomanceResource(StaffPerfomance::all());
    }

    public function store(StoreStaffPerfomanceRequest $request)
    {
        $staffPerfomance = StaffPerfomance::create($request->validated());

        return (new StaffPerfomanceResource($staffPerfomance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StaffPerfomance $staffPerfomance)
    {
        abort_if(Gate::denies('staff_perfomance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaffPerfomanceResource($staffPerfomance);
    }

    public function update(UpdateStaffPerfomanceRequest $request, StaffPerfomance $staffPerfomance)
    {
        $staffPerfomance->update($request->validated());

        return (new StaffPerfomanceResource($staffPerfomance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StaffPerfomance $staffPerfomance)
    {
        abort_if(Gate::denies('staff_perfomance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffPerfomance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
