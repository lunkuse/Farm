<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenditureTypeRequest;
use App\Http\Requests\UpdateExpenditureTypeRequest;
use App\Http\Resources\Admin\ExpenditureTypeResource;
use App\Models\ExpenditureType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenditureTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenditure_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenditureTypeResource(ExpenditureType::all());
    }

    public function store(StoreExpenditureTypeRequest $request)
    {
        $expenditureType = ExpenditureType::create($request->validated());

        return (new ExpenditureTypeResource($expenditureType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ExpenditureType $expenditureType)
    {
        abort_if(Gate::denies('expenditure_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExpenditureTypeResource($expenditureType);
    }

    public function update(UpdateExpenditureTypeRequest $request, ExpenditureType $expenditureType)
    {
        $expenditureType->update($request->validated());

        return (new ExpenditureTypeResource($expenditureType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ExpenditureType $expenditureType)
    {
        abort_if(Gate::denies('expenditure_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expenditureType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
