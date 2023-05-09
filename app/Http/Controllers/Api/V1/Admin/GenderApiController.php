<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGenderRequest;
use App\Http\Requests\UpdateGenderRequest;
use App\Http\Resources\Admin\GenderResource;
use App\Models\Gender;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GenderResource(Gender::all());
    }

    public function store(StoreGenderRequest $request)
    {
        $gender = Gender::create($request->validated());

        return (new GenderResource($gender))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gender $gender)
    {
        abort_if(Gate::denies('gender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GenderResource($gender);
    }

    public function update(UpdateGenderRequest $request, Gender $gender)
    {
        $gender->update($request->validated());

        return (new GenderResource($gender))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gender $gender)
    {
        abort_if(Gate::denies('gender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gender->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
