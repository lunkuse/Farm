<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HealthCondition;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HealthConditionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('health_condition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.health-condition.index');
    }

    public function create()
    {
        abort_if(Gate::denies('health_condition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.health-condition.create');
    }

    public function edit(HealthCondition $healthCondition)
    {
        abort_if(Gate::denies('health_condition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.health-condition.edit', compact('healthCondition'));
    }

    public function show(HealthCondition $healthCondition)
    {
        abort_if(Gate::denies('health_condition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.health-condition.show', compact('healthCondition'));
    }
}
