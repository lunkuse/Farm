<?php

namespace App\Http\Requests;

use App\Models\StaffPerfomance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStaffPerfomanceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('staff_perfomance_edit'),
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
