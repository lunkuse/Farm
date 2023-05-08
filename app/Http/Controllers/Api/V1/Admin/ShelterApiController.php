<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShelterRequest;
use App\Http\Requests\UpdateShelterRequest;
use App\Http\Resources\Admin\ShelterResource;
use App\Models\Shelter;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShelterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shelter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShelterResource(Shelter::with(['block'])->get());
    }

    public function store(StoreShelterRequest $request)
    {
        $shelter = Shelter::create($request->validated());

        return (new ShelterResource($shelter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Shelter $shelter)
    {
        abort_if(Gate::denies('shelter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShelterResource($shelter->load(['block']));
    }

    public function update(UpdateShelterRequest $request, Shelter $shelter)
    {
        $shelter->update($request->validated());

        return (new ShelterResource($shelter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Shelter $shelter)
    {
        abort_if(Gate::denies('shelter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shelter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
