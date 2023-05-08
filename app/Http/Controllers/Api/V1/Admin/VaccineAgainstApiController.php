<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVaccineAgainstRequest;
use App\Http\Requests\UpdateVaccineAgainstRequest;
use App\Http\Resources\Admin\VaccineAgainstResource;
use App\Models\VaccineAgainst;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VaccineAgainstApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vaccine_against_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VaccineAgainstResource(VaccineAgainst::all());
    }

    public function store(StoreVaccineAgainstRequest $request)
    {
        $vaccineAgainst = VaccineAgainst::create($request->validated());

        return (new VaccineAgainstResource($vaccineAgainst))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VaccineAgainst $vaccineAgainst)
    {
        abort_if(Gate::denies('vaccine_against_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VaccineAgainstResource($vaccineAgainst);
    }

    public function update(UpdateVaccineAgainstRequest $request, VaccineAgainst $vaccineAgainst)
    {
        $vaccineAgainst->update($request->validated());

        return (new VaccineAgainstResource($vaccineAgainst))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VaccineAgainst $vaccineAgainst)
    {
        abort_if(Gate::denies('vaccine_against_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vaccineAgainst->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
