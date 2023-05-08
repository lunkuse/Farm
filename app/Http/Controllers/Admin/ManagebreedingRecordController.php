<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManagebreedingRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManagebreedingRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('managebreeding_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.managebreeding-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('managebreeding_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.managebreeding-record.create');
    }

    public function edit(ManagebreedingRecord $managebreedingRecord)
    {
        abort_if(Gate::denies('managebreeding_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.managebreeding-record.edit', compact('managebreedingRecord'));
    }

    public function show(ManagebreedingRecord $managebreedingRecord)
    {
        abort_if(Gate::denies('managebreeding_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $managebreedingRecord->load('nannyTagNo', 'buckTagNo', 'animalType', 'deliveryNature', 'kidsNumber', 'kidSex', 'breedingComments', 'tag');

        return view('admin.managebreeding-record.show', compact('managebreedingRecord'));
    }
}
