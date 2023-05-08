<?php

namespace App\Http\Requests;

use App\Models\ManagebreedingRecord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateManagebreedingRecordRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('managebreeding_record_edit'),
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
            'nanny_tag_no_id' => [
                'integer',
                'exists:general_stock_records,id',
                'nullable',
            ],
            'buck_tag_no_id' => [
                'integer',
                'exists:general_stock_records,id',
                'nullable',
            ],
            'date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'animal_type_id' => [
                'integer',
                'exists:stock_types,id',
                'nullable',
            ],
            'delivery_nature_id' => [
                'integer',
                'exists:delivery_natures,id',
                'nullable',
            ],
            'kids_number_id' => [
                'integer',
                'exists:kid_numbers,id',
                'nullable',
            ],
            'kid_sex' => [
                'array',
            ],
            'kid_sex.*.id' => [
                'integer',
                'exists:genders,id',
            ],
            'breeding_comments' => [
                'array',
            ],
            'breeding_comments.*.id' => [
                'integer',
                'exists:breeding_comments,id',
            ],
            'tag' => [
                'array',
            ],
            'tag.*.id' => [
                'integer',
                'exists:general_stock_records,id',
            ],
        ];
    }
}
