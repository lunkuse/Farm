<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageHealthRecord extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'manage_health_records';

    public static $search = [
        'treatment_administered',
        'comments',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'tag_no_id',
        'other_clinical_history',
        'other_current_diagnosis',
        'other_treatment_administered',
        'attending_officer',
        'comments',
        'stock_attendant_id',
    ];

    public $orderable = [
        'id',
        'date',
        'tag_no.tag_no',
        'tag_no.dob',
        'other_clinical_history',
        'other_current_diagnosis',
        'other_treatment_administered',
        'attending_officer',
        'comments',
        'stock_attendant.name',
    ];

    public $filterable = [
        'id',
        'date',
        'tag_no.tag_no',
        'tag_no.dob',
        'clinical_history.name',
        'other_clinical_history',
        'current_diagnosis.name',
        'other_current_diagnosis',
        'treatment_administered.name',
        'other_treatment_administered',
        'attending_officer',
        'comments',
        'stock_attendant.name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function tagNo()
    {
        return $this->belongsTo(GeneralStockRecord::class);
    }

    public function clinicalHistory()
    {
        return $this->belongsToMany(ClinicalHistory::class);
    }

    public function currentDiagnosis()
    {
        return $this->belongsToMany(CurrentDiagnosi::class);
    }

    public function treatmentAdministered()
    {
        return $this->belongsToMany(TreatmentAdministered::class);
    }

    public function stockAttendant()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
