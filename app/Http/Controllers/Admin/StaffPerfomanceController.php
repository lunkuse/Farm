<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaffPerfomance;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffPerfomanceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_perfomance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-perfomance.index');
    }

    public function create()
    {
        abort_if(Gate::denies('staff_perfomance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-perfomance.create');
    }

    public function edit(StaffPerfomance $staffPerfomance)
    {
        abort_if(Gate::denies('staff_perfomance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-perfomance.edit', compact('staffPerfomance'));
    }

    public function show(StaffPerfomance $staffPerfomance)
    {
        abort_if(Gate::denies('staff_perfomance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-perfomance.show', compact('staffPerfomance'));
    }
}
