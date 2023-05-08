<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBreedRequest;
use App\Http\Requests\UpdateBreedRequest;
use App\Http\Resources\Admin\BreedResource;
use App\Models\Breed;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BreedApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('breed_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BreedResource(Breed::all());
    }

    public function store(StoreBreedRequest $request)
    {
        $breed = Breed::create($request->validated());

        return (new BreedResource($breed))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Breed $breed)
    {
        abort_if(Gate::denies('breed_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BreedResource($breed);
    }

    public function update(UpdateBreedRequest $request, Breed $breed)
    {
        $breed->update($request->validated());

        return (new BreedResource($breed))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Breed $breed)
    {
        abort_if(Gate::denies('breed_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $breed->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
