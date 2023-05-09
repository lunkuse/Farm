<?php

namespace App\Http\Requests;

use App\Models\ManageHealthRecord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreManageHealthRecordRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('manage_health_record_create'),
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
            'tag_no_id' => [
                'integer',
                'exists:general_stock_records,id',
                'required',
            ],
            'clinical_history' => [
                'array',
            ],
            'clinical_history.*.id' => [
                'integer',
                'exists:clinical_histories,id',
            ],
            'other_clinical_history' => [
                'string',
                'nullable',
            ],
            'current_diagnosis' => [
                'array',
            ],
            'current_diagnosis.*.id' => [
                'integer',
                'exists:current_diagnosis,id',
            ],
            'other_current_diagnosis' => [
                'string',
                'nullable',
            ],
            'treatment_administered' => [
                'array',
            ],
            'treatment_administered.*.id' => [
                'integer',
                'exists:treatment_administereds,id',
            ],
            'other_treatment_administered' => [
                'string',
                'nullable',
            ],
            'attending_officer' => [
                'string',
                'nullable',
            ],
            'comments' => [
                'string',
                'nullable',
            ],
            'stock_attendant_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
