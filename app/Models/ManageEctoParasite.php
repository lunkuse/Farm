<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageEctoParasite extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'manage_ecto_parasites';

    public static $search = [
        'comments',
    ];

    protected $dates = [
        'date',
        'next_spray_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'other_acaricide',
        'time_of_spray',
        'next_spray_date',
        'comments',
        'attending_officer',
    ];

    public $orderable = [
        'id',
        'date',
        'other_acaricide',
        'time_of_spray',
        'next_spray_date',
        'comments',
        'attending_officer',
    ];

    public $filterable = [
        'id',
        'block.title',
        'date',
        'acaricide_used.name',
        'other_acaricide',
        'time_of_spray',
        'next_spray_date',
        'comments',
        'attending_officer',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function block()
    {
        return $this->belongsToMany(Block::class);
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function acaricideUsed()
    {
        return $this->belongsToMany(AcaricideUsed::class);
    }

    public function getNextSprayDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setNextSprayDateAttribute($value)
    {
        $this->attributes['next_spray_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
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
