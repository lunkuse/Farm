<?php

namespace App\Http\Requests;

use App\Models\Shelter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShelterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('shelter_edit'),
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
            'block_id' => [
                'integer',
                'exists:blocks,id',
                'nullable',
            ],
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
