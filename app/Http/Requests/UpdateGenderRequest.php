<?php

namespace App\Http\Requests;

use App\Models\Gender;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGenderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('gender_edit'),
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
                'min:2',
                'max:1000',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
