<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CurrentDiagnosi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrentDiagnosiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('current_diagnosi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.current-diagnosi.index');
    }

    public function create()
    {
        abort_if(Gate::denies('current_diagnosi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.current-diagnosi.create');
    }

    public function edit(CurrentDiagnosi $currentDiagnosi)
    {
        abort_if(Gate::denies('current_diagnosi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.current-diagnosi.edit', compact('currentDiagnosi'));
    }

    public function show(CurrentDiagnosi $currentDiagnosi)
    {
        abort_if(Gate::denies('current_diagnosi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.current-diagnosi.show', compact('currentDiagnosi'));
    }
}
