<?php

namespace App\Http\Requests;

use App\Models\CurrentDiagnosi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCurrentDiagnosiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('current_diagnosi_edit'),
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
            'name' => [
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
