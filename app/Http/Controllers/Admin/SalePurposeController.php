<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalePurpose;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalePurposeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sale_purpose_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sale-purpose.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sale_purpose_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sale-purpose.create');
    }

    public function edit(SalePurpose $salePurpose)
    {
        abort_if(Gate::denies('sale_purpose_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sale-purpose.edit', compact('salePurpose'));
    }

    public function show(SalePurpose $salePurpose)
    {
        abort_if(Gate::denies('sale_purpose_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sale-purpose.show', compact('salePurpose'));
    }
}
