<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalePurposeRequest;
use App\Http\Requests\UpdateSalePurposeRequest;
use App\Http\Resources\Admin\SalePurposeResource;
use App\Models\SalePurpose;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalePurposeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sale_purpose_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalePurposeResource(SalePurpose::all());
    }

    public function store(StoreSalePurposeRequest $request)
    {
        $salePurpose = SalePurpose::create($request->validated());

        return (new SalePurposeResource($salePurpose))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SalePurpose $salePurpose)
    {
        abort_if(Gate::denies('sale_purpose_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SalePurposeResource($salePurpose);
    }

    public function update(UpdateSalePurposeRequest $request, SalePurpose $salePurpose)
    {
        $salePurpose->update($request->validated());

        return (new SalePurposeResource($salePurpose))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SalePurpose $salePurpose)
    {
        abort_if(Gate::denies('sale_purpose_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salePurpose->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
