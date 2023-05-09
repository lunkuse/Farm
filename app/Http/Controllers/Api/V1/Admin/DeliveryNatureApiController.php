<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryNatureRequest;
use App\Http\Requests\UpdateDeliveryNatureRequest;
use App\Http\Resources\Admin\DeliveryNatureResource;
use App\Models\DeliveryNature;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeliveryNatureApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delivery_nature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeliveryNatureResource(DeliveryNature::all());
    }

    public function store(StoreDeliveryNatureRequest $request)
    {
        $deliveryNature = DeliveryNature::create($request->validated());

        return (new DeliveryNatureResource($deliveryNature))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DeliveryNature $deliveryNature)
    {
        abort_if(Gate::denies('delivery_nature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DeliveryNatureResource($deliveryNature);
    }

    public function update(UpdateDeliveryNatureRequest $request, DeliveryNature $deliveryNature)
    {
        $deliveryNature->update($request->validated());

        return (new DeliveryNatureResource($deliveryNature))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DeliveryNature $deliveryNature)
    {
        abort_if(Gate::denies('delivery_nature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deliveryNature->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
