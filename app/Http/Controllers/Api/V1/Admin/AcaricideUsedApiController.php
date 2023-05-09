<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAcaricideUsedRequest;
use App\Http\Requests\UpdateAcaricideUsedRequest;
use App\Http\Resources\Admin\AcaricideUsedResource;
use App\Models\AcaricideUsed;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AcaricideUsedApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acaricide_used_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AcaricideUsedResource(AcaricideUsed::all());
    }

    public function store(StoreAcaricideUsedRequest $request)
    {
        $acaricideUsed = AcaricideUsed::create($request->validated());

        return (new AcaricideUsedResource($acaricideUsed))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AcaricideUsed $acaricideUsed)
    {
        abort_if(Gate::denies('acaricide_used_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AcaricideUsedResource($acaricideUsed);
    }

    public function update(UpdateAcaricideUsedRequest $request, AcaricideUsed $acaricideUsed)
    {
        $acaricideUsed->update($request->validated());

        return (new AcaricideUsedResource($acaricideUsed))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AcaricideUsed $acaricideUsed)
    {
        abort_if(Gate::denies('acaricide_used_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acaricideUsed->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
