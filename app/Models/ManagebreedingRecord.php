<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagebreedingRecord extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'managebreeding_records';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nanny_tag_no_id',
        'buck_tag_no_id',
        'date',
        'animal_type_id',
        'delivery_nature_id',
        'kids_number_id',
    ];

    public $orderable = [
        'id',
        'nanny_tag_no.tag_no',
        'nanny_tag_no.age',
        'buck_tag_no.tag_no',
        'buck_tag_no.age',
        'date',
        'animal_type.title',
        'delivery_nature.name',
        'kids_number.name',
        'kids_number.number',
    ];

    public $filterable = [
        'id',
        'nanny_tag_no.tag_no',
        'nanny_tag_no.age',
        'buck_tag_no.tag_no',
        'buck_tag_no.age',
        'date',
        'animal_type.title',
        'delivery_nature.name',
        'kids_number.name',
        'kids_number.number',
        'kid_sex.name',
        'breeding_comments.comment',
        'tag.tag_no',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function nannyTagNo()
    {
        return $this->belongsTo(GeneralStockRecord::class);
    }

    public function buckTagNo()
    {
        return $this->belongsTo(GeneralStockRecord::class);
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function animalType()
    {
        return $this->belongsTo(StockType::class);
    }

    public function deliveryNature()
    {
        return $this->belongsTo(DeliveryNature::class);
    }

    public function kidsNumber()
    {
        return $this->belongsTo(KidNumber::class);
    }

    public function kidSex()
    {
        return $this->belongsToMany(Gender::class);
    }

    public function breedingComments()
    {
        return $this->belongsToMany(BreedingComment::class);
    }

    public function tag()
    {
        return $this->belongsToMany(GeneralStockRecord::class);
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
