<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SourceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('source_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.source.index');
    }

    public function create()
    {
        abort_if(Gate::denies('source_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.source.create');
    }

    public function edit(Source $source)
    {
        abort_if(Gate::denies('source_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.source.edit', compact('source'));
    }

    public function show(Source $source)
    {
        abort_if(Gate::denies('source_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.source.show', compact('source'));
    }
}
