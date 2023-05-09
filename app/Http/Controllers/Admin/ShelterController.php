<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shelter;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShelterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shelter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shelter.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shelter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shelter.create');
    }

    public function edit(Shelter $shelter)
    {
        abort_if(Gate::denies('shelter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shelter.edit', compact('shelter'));
    }

    public function show(Shelter $shelter)
    {
        abort_if(Gate::denies('shelter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shelter->load('block');

        return view('admin.shelter.show', compact('shelter'));
    }
}
