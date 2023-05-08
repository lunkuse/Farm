<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaffPaymentRecord;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StaffPaymentRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_payment_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-payment-record.index');
    }

    public function create()
    {
        abort_if(Gate::denies('staff_payment_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-payment-record.create');
    }

    public function edit(StaffPaymentRecord $staffPaymentRecord)
    {
        abort_if(Gate::denies('staff_payment_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-payment-record.edit', compact('staffPaymentRecord'));
    }

    public function show(StaffPaymentRecord $staffPaymentRecord)
    {
        abort_if(Gate::denies('staff_payment_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staff-payment-record.show', compact('staffPaymentRecord'));
    }
}
