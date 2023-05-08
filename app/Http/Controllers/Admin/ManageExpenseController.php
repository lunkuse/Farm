<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageExpense;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageExpenseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-expense.index');
    }

    public function create()
    {
        abort_if(Gate::denies('manage_expense_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-expense.create');
    }

    public function edit(ManageExpense $manageExpense)
    {
        abort_if(Gate::denies('manage_expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.manage-expense.edit', compact('manageExpense'));
    }

    public function show(ManageExpense $manageExpense)
    {
        abort_if(Gate::denies('manage_expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageExpense->load('expenditureType', 'attendant');

        return view('admin.manage-expense.show', compact('manageExpense'));
    }
}
