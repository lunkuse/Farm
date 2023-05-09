<?php

namespace App\Http\Requests;

use App\Models\ExpenditureType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExpenditureTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('expenditure_type_edit'),
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
            'type' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
