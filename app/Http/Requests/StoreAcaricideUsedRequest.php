<?php

namespace App\Http\Requests;

use App\Models\AcaricideUsed;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAcaricideUsedRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('acaricide_used_create'),
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
