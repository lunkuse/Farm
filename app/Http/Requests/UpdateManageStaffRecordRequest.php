<?php

namespace App\Http\Requests;

use App\Models\ManageStaffRecord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManageStaffRecordRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('manage_staff_record_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'staff_name_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'role' => [
                'array',
            ],
            'role.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'wage' => [
                'numeric',
                'required',
            ],
            'payment_record_id' => [
                'integer',
                'exists:staff_payment_records,id',
                'required',
            ],
            'month_year' => [
                'string',
                'nullable',
            ],
            'staff_perfomance_id' => [
                'integer',
                'exists:staff_perfomances,id',
                'required',
            ],
            'recommendation' => [
                'array',
            ],
            'recommendation.*.id' => [
                'integer',
                'exists:staff_recommendations,id',
            ],
        ];
    }
}
