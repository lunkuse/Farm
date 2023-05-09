<?php

namespace App\Http\Requests;

use App\Models\GeneralStockRecord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGeneralStockRecordRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('general_stock_record_create'),
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
            'date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'shelter_id' => [
                'integer',
                'exists:shelters,id',
                'nullable',
            ],
            'animal_type_id' => [
                'integer',
                'exists:stock_types,id',
                'nullable',
            ],
            'other_animal_type' => [
                'string',
                'nullable',
            ],
            'tag_no' => [
                'string',
                'nullable',
            ],
            'breed_id' => [
                'integer',
                'exists:breeds,id',
                'nullable',
            ],
            'other_breed' => [
                'string',
                'nullable',
            ],
            'gender_id' => [
                'integer',
                'exists:genders,id',
                'nullable',
            ],
            'dob' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'age' => [
                'string',
                'nullable',
            ],
            'color_id' => [
                'integer',
                'exists:colors,id',
                'nullable',
            ],
            'other_color' => [
                'string',
                'nullable',
            ],
            'source_id' => [
                'integer',
                'exists:sources,id',
                'nullable',
            ],
            'other_source' => [
                'string',
                'nullable',
            ],
            'comments' => [
                'string',
                'nullable',
            ],
            'availability' => [
                'nullable',
                'in:' . implode(',', array_keys(GeneralStockRecord::AVAILABILITY_SELECT)),
            ],
        ];
    }
}
