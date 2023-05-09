<?php

namespace App\Http\Requests;

use App\Models\Breed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBreedRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('breed_create'),
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
                'min:2',
                'nullable',
            ],
        ];
    }
}
