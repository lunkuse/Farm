<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageHealthRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageHealthRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_health_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-health-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manage_health_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-health-record.create');
    }

    public function edit(ManageHealthRecord $manageHealthRecord)
    {
        abort_if(Gate::denies('manage_health_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-health-record.edit', compact('manageHealthRecord'));
    }

    public function show(ManageHealthRecord $manageHealthRecord)
    {
        abort_if(Gate::denies('manage_health_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageHealthRecord->load('tagNo', 'clinicalHistory', 'currentDiagnosis', 'treatmentAdministered', 'stockAttendant');

        return view('admin.manage-health-record.show', compact('manageHealthRecord'));
    }
}
