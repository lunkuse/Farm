<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageSaleRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageSaleRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_sale_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-sale-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manage_sale_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-sale-record.create');
    }

    public function edit(ManageSaleRecord $manageSaleRecord)
    {
        abort_if(Gate::denies('manage_sale_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-sale-record.edit', compact('manageSaleRecord'));
    }

    public function show(ManageSaleRecord $manageSaleRecord)
    {
        abort_if(Gate::denies('manage_sale_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageSaleRecord->load('animalTag', 'salePurpose');

        return view('admin.manage-sale-record.show', compact('manageSaleRecord'));
    }
}
