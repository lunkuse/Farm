<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TreatmentAdministered;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TreatmentAdministeredController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('treatment_administered_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.treatment-administered.index');
    }

    public function create()
    {
        abort_if(Gate::denies('treatment_administered_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.treatment-administered.create');
    }

    public function edit(TreatmentAdministered $treatmentAdministered)
    {
        abort_if(Gate::denies('treatment_administered_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.treatment-administered.edit', compact('treatmentAdministered'));
    }

    public function show(TreatmentAdministered $treatmentAdministered)
    {
        abort_if(Gate::denies('treatment_administered_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.treatment-administered.show', compact('treatmentAdministered'));
    }
}
