<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreManageExpenseRequest;
use App\Http\Requests\UpdateManageExpenseRequest;
use App\Http\Resources\Admin\ManageExpenseResource;
use App\Models\ManageExpense;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ManageExpenseApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('manage_expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageExpenseResource(ManageExpense::with(['expenditureType', 'attendant'])->get());
    }

    public function store(StoreManageExpenseRequest $request)
    {
        $manageExpense = ManageExpense::create($request->validated());

        return (new ManageExpenseResource($manageExpense))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ManageExpense $manageExpense)
    {
        abort_if(Gate::denies('manage_expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ManageExpenseResource($manageExpense->load(['expenditureType', 'attendant']));
    }

    public function update(UpdateManageExpenseRequest $request, ManageExpense $manageExpense)
    {
        $manageExpense->update($request->validated());

        return (new ManageExpenseResource($manageExpense))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ManageExpense $manageExpense)
    {
        abort_if(Gate::denies('manage_expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $manageExpense->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
