<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrentDiagnosiRequest;
use App\Http\Requests\UpdateCurrentDiagnosiRequest;
use App\Http\Resources\Admin\CurrentDiagnosiResource;
use App\Models\CurrentDiagnosi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrentDiagnosiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('current_diagnosi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrentDiagnosiResource(CurrentDiagnosi::all());
    }

    public function store(StoreCurrentDiagnosiRequest $request)
    {
        $currentDiagnosi = CurrentDiagnosi::create($request->validated());

        return (new CurrentDiagnosiResource($currentDiagnosi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CurrentDiagnosi $currentDiagnosi)
    {
        abort_if(Gate::denies('current_diagnosi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CurrentDiagnosiResource($currentDiagnosi);
    }

    public function update(UpdateCurrentDiagnosiRequest $request, CurrentDiagnosi $currentDiagnosi)
    {
        $currentDiagnosi->update($request->validated());

        return (new CurrentDiagnosiResource($currentDiagnosi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CurrentDiagnosi $currentDiagnosi)
    {
        abort_if(Gate::denies('current_diagnosi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currentDiagnosi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
