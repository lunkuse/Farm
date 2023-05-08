<?php

namespace App\Http\Requests;

use App\Models\VaccineAgainst;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVaccineAgainstRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('vaccine_against_edit'),
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
