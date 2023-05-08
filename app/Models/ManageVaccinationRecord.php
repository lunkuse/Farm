<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageVaccinationRecord extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'manage_vaccination_records';

    protected $dates = [
        'date',
        'next_vac_date_month_yea_r',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'shelter_id',
        'other_vaccination_against',
        'other_category',
        'next_vac_date_month_yea_r',
        'attending_officer',
    ];

    public $orderable = [
        'id',
        'date',
        'shelter.name',
        'other_vaccination_against',
        'other_category',
        'next_vac_date_month_yea_r',
        'attending_officer',
    ];

    public $filterable = [
        'id',
        'date',
        'shelter.name',
        'vaccine_against.name',
        'other_vaccination_against',
        'category_of_animals_vaccinated.name',
        'other_category',
        'next_vac_date_month_yea_r',
        'attending_officer',
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

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }

    public function vaccineAgainst()
    {
        return $this->belongsToMany(VaccineAgainst::class);
    }

    public function categoryOfAnimalsVaccinated()
    {
        return $this->belongsToMany(CategoryOfAnimalsVaccinated::class);
    }

    public function getNextVacDateMonthYeaRAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setNextVacDateMonthYeaRAttribute($value)
    {
        $this->attributes['next_vac_date_month_yea_r'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
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
