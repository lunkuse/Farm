<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageStaffRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageStaffRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_staff_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-staff-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manage_staff_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-staff-record.create');
    }

    public function edit(ManageStaffRecord $manageStaffRecord)
    {
        abort_if(Gate::denies('manage_staff_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-staff-record.edit', compact('manageStaffRecord'));
    }

    public function show(ManageStaffRecord $manageStaffRecord)
    {
        abort_if(Gate::denies('manage_staff_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageStaffRecord->load('staffName', 'role', 'paymentRecord', 'staffPerfomance', 'recommendation');

        return view('admin.manage-staff-record.show', compact('manageStaffRecord'));
    }
}
