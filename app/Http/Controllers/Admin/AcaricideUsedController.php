<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcaricideUsed;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AcaricideUsedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('acaricide_used_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acaricide-used.index');
    }

    public function create()
    {
        abort_if(Gate::denies('acaricide_used_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acaricide-used.create');
    }

    public function edit(AcaricideUsed $acaricideUsed)
    {
        abort_if(Gate::denies('acaricide_used_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acaricide-used.edit', compact('acaricideUsed'));
    }

    public function show(AcaricideUsed $acaricideUsed)
    {
        abort_if(Gate::denies('acaricide_used_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acaricide-used.show', compact('acaricideUsed'));
    }
}
