<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrchardRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrchardRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('orchard_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orchard-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('orchard_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orchard-record.create');
    }

    public function edit(OrchardRecord $orchardRecord)
    {
        abort_if(Gate::denies('orchard_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orchard-record.edit', compact('orchardRecord'));
    }

    public function show(OrchardRecord $orchardRecord)
    {
        abort_if(Gate::denies('orchard_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orchardRecord->load('fruitType', 'harvestors', 'comments', 'recordingOfficer');

        return view('admin.orchard-record.show', compact('orchardRecord'));
    }
}
