<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpiritialAffiliation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpiritialAffiliationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('spiritial_affiliation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.spiritial-affiliation.index');
    }

    public function create()
    {
        abort_if(Gate::denies('spiritial_affiliation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.spiritial-affiliation.create');
    }

    public function edit(SpiritialAffiliation $spiritialAffiliation)
    {
        abort_if(Gate::denies('spiritial_affiliation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.spiritial-affiliation.edit', compact('spiritialAffiliation'));
    }

    public function show(SpiritialAffiliation $spiritialAffiliation)
    {
        abort_if(Gate::denies('spiritial_affiliation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.spiritial-affiliation.show', compact('spiritialAffiliation'));
    }
}
