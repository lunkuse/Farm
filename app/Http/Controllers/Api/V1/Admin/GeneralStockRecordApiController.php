<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGeneralStockRecordRequest;
use App\Http\Requests\UpdateGeneralStockRecordRequest;
use App\Http\Resources\Admin\GeneralStockRecordResource;
use App\Models\GeneralStockRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeneralStockRecordApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('general_stock_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GeneralStockRecordResource(GeneralStockRecord::with(['shelter', 'animalType', 'breed', 'gender', 'color', 'source'])->get());
    }

    public function store(StoreGeneralStockRecordRequest $request)
    {
        $generalStockRecord = GeneralStockRecord::create($request->validated());

        return (new GeneralStockRecordResource($generalStockRecord))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GeneralStockRecord $generalStockRecord)
    {
        abort_if(Gate::denies('general_stock_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GeneralStockRecordResource($generalStockRecord->load(['shelter', 'animalType', 'breed', 'gender', 'color', 'source']));
    }

    public function update(UpdateGeneralStockRecordRequest $request, GeneralStockRecord $generalStockRecord)
    {
        $generalStockRecord->update($request->validated());

        return (new GeneralStockRecordResource($generalStockRecord))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GeneralStockRecord $generalStockRecord)
    {
        abort_if(Gate::denies('general_stock_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalStockRecord->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
