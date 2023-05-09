<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralStockRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeneralStockRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('general_stock_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.general-stock-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('general_stock_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.general-stock-record.create');
    }

    public function edit(GeneralStockRecord $generalStockRecord)
    {
        abort_if(Gate::denies('general_stock_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.general-stock-record.edit', compact('generalStockRecord'));
    }

    public function show(GeneralStockRecord $generalStockRecord)
    {
        abort_if(Gate::denies('general_stock_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalStockRecord->load('shelter', 'animalType', 'breed', 'gender', 'color', 'source');

        return view('admin.general-stock-record.show', compact('generalStockRecord'));
    }
}
