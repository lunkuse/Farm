<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExpenditureType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenditureTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('expenditure_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenditure-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('expenditure_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenditure-type.create');
    }

    public function edit(ExpenditureType $expenditureType)
    {
        abort_if(Gate::denies('expenditure_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenditure-type.edit', compact('expenditureType'));
    }

    public function show(ExpenditureType $expenditureType)
    {
        abort_if(Gate::denies('expenditure_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.expenditure-type.show', compact('expenditureType'));
    }
}
