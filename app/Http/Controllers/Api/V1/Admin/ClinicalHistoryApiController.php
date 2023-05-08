<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClinicalHistoryRequest;
use App\Http\Requests\UpdateClinicalHistoryRequest;
use App\Http\Resources\Admin\ClinicalHistoryResource;
use App\Models\ClinicalHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClinicalHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clinical_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClinicalHistoryResource(ClinicalHistory::all());
    }

    public function store(StoreClinicalHistoryRequest $request)
    {
        $clinicalHistory = ClinicalHistory::create($request->validated());

        return (new ClinicalHistoryResource($clinicalHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClinicalHistory $clinicalHistory)
    {
        abort_if(Gate::denies('clinical_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClinicalHistoryResource($clinicalHistory);
    }

    public function update(UpdateClinicalHistoryRequest $request, ClinicalHistory $clinicalHistory)
    {
        $clinicalHistory->update($request->validated());

        return (new ClinicalHistoryResource($clinicalHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClinicalHistory $clinicalHistory)
    {
        abort_if(Gate::denies('clinical_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clinicalHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
