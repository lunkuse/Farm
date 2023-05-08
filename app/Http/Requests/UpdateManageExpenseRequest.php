<?php

namespace App\Http\Requests;

use App\Models\ManageExpense;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManageExpenseRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('manage_expense_edit'),
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
            'date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'expenditure_type_id' => [
                'integer',
                'exists:expenditure_types,id',
                'nullable',
            ],
            'quantity' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'required',
            ],
            'comments' => [
                'string',
                'nullable',
            ],
            'attendant_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
