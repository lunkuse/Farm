<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KidNumber;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KidNumberController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kid_number_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kid-number.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kid_number_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kid-number.create');
    }

    public function edit(KidNumber $kidNumber)
    {
        abort_if(Gate::denies('kid_number_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kid-number.edit', compact('kidNumber'));
    }

    public function show(KidNumber $kidNumber)
    {
        abort_if(Gate::denies('kid_number_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kid-number.show', compact('kidNumber'));
    }
}
