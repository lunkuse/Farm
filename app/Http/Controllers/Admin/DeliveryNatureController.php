<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryNature;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeliveryNatureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delivery_nature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivery-nature.index');
    }

    public function create()
    {
        abort_if(Gate::denies('delivery_nature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivery-nature.create');
    }

    public function edit(DeliveryNature $deliveryNature)
    {
        abort_if(Gate::denies('delivery_nature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivery-nature.edit', compact('deliveryNature'));
    }

    public function show(DeliveryNature $deliveryNature)
    {
        abort_if(Gate::denies('delivery_nature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivery-nature.show', compact('deliveryNature'));
    }
}
