<?php

namespace App\Http\Requests;

use App\Models\BreedingComment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBreedingCommentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('breeding_comment_edit'),
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
            'comment' => [
                'string',
                'required',
            ],
        ];
    }
}
