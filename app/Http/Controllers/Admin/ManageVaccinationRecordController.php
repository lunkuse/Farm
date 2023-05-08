<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageVaccinationRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageVaccinationRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_vaccination_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-vaccination-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manage_vaccination_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-vaccination-record.create');
    }

    public function edit(ManageVaccinationRecord $manageVaccinationRecord)
    {
        abort_if(Gate::denies('manage_vaccination_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-vaccination-record.edit', compact('manageVaccinationRecord'));
    }

    public function show(ManageVaccinationRecord $manageVaccinationRecord)
    {
        abort_if(Gate::denies('manage_vaccination_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageVaccinationRecord->load('shelter', 'vaccineAgainst', 'categoryOfAnimalsVaccinated');

        return view('admin.manage-vaccination-record.show', compact('manageVaccinationRecord'));
    }
}
