<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VaccineAgainst;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VaccineAgainstController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vaccine_against_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vaccine-against.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vaccine_against_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vaccine-against.create');
    }

    public function edit(VaccineAgainst $vaccineAgainst)
    {
        abort_if(Gate::denies('vaccine_against_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vaccine-against.edit', compact('vaccineAgainst'));
    }

    public function show(VaccineAgainst $vaccineAgainst)
    {
        abort_if(Gate::denies('vaccine_against_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vaccine-against.show', compact('vaccineAgainst'));
    }
}
