<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTreatmentAdministeredRequest;
use App\Http\Requests\UpdateTreatmentAdministeredRequest;
use App\Http\Resources\Admin\TreatmentAdministeredResource;
use App\Models\TreatmentAdministered;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TreatmentAdministeredApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('treatment_administered_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TreatmentAdministeredResource(TreatmentAdministered::all());
    }

    public function store(StoreTreatmentAdministeredRequest $request)
    {
        $treatmentAdministered = TreatmentAdministered::create($request->validated());

        return (new TreatmentAdministeredResource($treatmentAdministered))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TreatmentAdministered $treatmentAdministered)
    {
        abort_if(Gate::denies('treatment_administered_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TreatmentAdministeredResource($treatmentAdministered);
    }

    public function update(UpdateTreatmentAdministeredRequest $request, TreatmentAdministered $treatmentAdministered)
    {
        $treatmentAdministered->update($request->validated());

        return (new TreatmentAdministeredResource($treatmentAdministered))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TreatmentAdministered $treatmentAdministered)
    {
        abort_if(Gate::denies('treatment_administered_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $treatmentAdministered->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
