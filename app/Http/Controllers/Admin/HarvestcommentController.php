<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Harvestcomment;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HarvestcommentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('harvestcomment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestcomment.index');
    }

    public function create()
    {
        abort_if(Gate::denies('harvestcomment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestcomment.create');
    }

    public function edit(Harvestcomment $harvestcomment)
    {
        abort_if(Gate::denies('harvestcomment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestcomment.edit', compact('harvestcomment'));
    }

    public function show(Harvestcomment $harvestcomment)
    {
        abort_if(Gate::denies('harvestcomment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.harvestcomment.show', compact('harvestcomment'));
    }
}
