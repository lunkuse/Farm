<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GenderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gender.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gender.create');
    }

    public function edit(Gender $gender)
    {
        abort_if(Gate::denies('gender_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gender.edit', compact('gender'));
    }

    public function show(Gender $gender)
    {
        abort_if(Gate::denies('gender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gender.show', compact('gender'));
    }
}
