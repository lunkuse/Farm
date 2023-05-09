<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StockTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stock_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stock-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('stock_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stock-type.create');
    }

    public function edit(StockType $stockType)
    {
        abort_if(Gate::denies('stock_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stock-type.edit', compact('stockType'));
    }

    public function show(StockType $stockType)
    {
        abort_if(Gate::denies('stock_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.stock-type.show', compact('stockType'));
    }
}
