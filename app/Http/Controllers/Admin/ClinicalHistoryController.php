<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicalHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClinicalHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('clinical_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clinical-history.index');
    }

    public function create()
    {
        abort_if(Gate::denies('clinical_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clinical-history.create');
    }

    public function edit(ClinicalHistory $clinicalHistory)
    {
        abort_if(Gate::denies('clinical_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clinical-history.edit', compact('clinicalHistory'));
    }

    public function show(ClinicalHistory $clinicalHistory)
    {
        abort_if(Gate::denies('clinical_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clinical-history.show', compact('clinicalHistory'));
    }
}
