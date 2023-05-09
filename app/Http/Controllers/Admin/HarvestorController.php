<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Harvestor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HarvestorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('harvestor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestor.index');
    }

    public function create()
    {
        abort_if(Gate::denies('harvestor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestor.create');
    }

    public function edit(Harvestor $harvestor)
    {
        abort_if(Gate::denies('harvestor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestor.edit', compact('harvestor'));
    }

    public function show(Harvestor $harvestor)
    {
        abort_if(Gate::denies('harvestor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestor.show', compact('harvestor'));
    }
}
