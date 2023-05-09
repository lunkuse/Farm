<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrchardRecord extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'orchard_records';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'fruit_type_id',
        'fruits_cleaned',
        'fruits_harvested',
        'fruits_sorted_out',
        'fruits_eaten',
        'recording_officer_id',
    ];

    public $orderable = [
        'id',
        'date',
        'fruit_type.name',
        'fruits_cleaned',
        'fruits_harvested',
        'fruits_sorted_out',
        'fruits_eaten',
        'recording_officer.name',
    ];

    public $filterable = [
        'id',
        'date',
        'fruit_type.name',
        'fruits_cleaned',
        'fruits_harvested',
        'fruits_sorted_out',
        'fruits_eaten',
        'harvestors.title',
        'comments.title',
        'recording_officer.name',
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

    public function fruitType()
    {
        return $this->belongsTo(FruitType::class);
    }

    public function harvestors()
    {
        return $this->belongsToMany(Harvestor::class);
    }

    public function comments()
    {
        return $this->belongsToMany(Harvestcomment::class);
    }

    public function recordingOfficer()
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
