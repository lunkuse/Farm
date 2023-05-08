<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralStockRecord extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'general_stock_records';

    public static $search = [
        'tag_no',
        'age',
        'comments',
    ];

    protected $dates = [
        'date',
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const AVAILABILITY_SELECT = [
        'available'   => 'Available',
        'unavailable' => 'Unavailable',
    ];

    protected $fillable = [
        'date',
        'shelter_id',
        'animal_type_id',
        'other_animal_type',
        'tag_no',
        'breed_id',
        'gender_id',
        'other_breed',
        'dob',
        'age',
        'color_id',
        'other_color',
        'source_id',
        'other_source',
        'comments',
        'availability',
    ];

    public $orderable = [
        'id',
        'date',
        'shelter.name',
        'animal_type.title',
        'other_animal_type',
        'tag_no',
        'breed.name',
        'gender.name',
        'other_breed',
        'dob',
        'age',
        'color.name',
        'other_color',
        'source.name',
        'other_source',
        'comments',
        'availability',
    ];

    public $filterable = [
        'id',
        'date',
        'shelter.name',
        'animal_type.title',
        'other_animal_type',
        'tag_no',
        'breed.name',
        'gender.name',
        'other_breed',
        'dob',
        'age',
        'color.name',
        'other_color',
        'source.name',
        'other_source',
        'comments',
        'availability',
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

    public function animalType()
    {
        return $this->belongsTo(StockType::class);
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function getAvailabilityLabelAttribute($value)
    {
        return static::AVAILABILITY_SELECT[$this->availability] ?? null;
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
