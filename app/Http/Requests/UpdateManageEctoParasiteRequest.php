<?php

namespace App\Http\Requests;

use App\Models\ManageEctoParasite;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManageEctoParasiteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('manage_ecto_parasite_edit'),
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
            'block' => [
                'array',
            ],
            'block.*.id' => [
                'integer',
                'exists:blocks,id',
            ],
            'date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'acaricide_used' => [
                'array',
            ],
            'acaricide_used.*.id' => [
                'integer',
                'exists:acaricide_useds,id',
            ],
            'other_acaricide' => [
                'string',
                'nullable',
            ],
            'time_of_spray' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'next_spray_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'comments' => [
                'string',
                'nullable',
            ],
            'attending_officer' => [
                'string',
                'nullable',
            ],
        ];
    }
}
