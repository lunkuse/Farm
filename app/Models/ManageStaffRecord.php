<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManageStaffRecord extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Auditable;

    public $table = 'manage_staff_records';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'staff_name_id',
        'wage',
        'payment_record_id',
        'month_year',
        'staff_perfomance_id',
    ];

    public $orderable = [
        'id',
        'staff_name.name',
        'wage',
        'payment_record.name',
        'month_year',
        'staff_perfomance.name',
    ];

    public $filterable = [
        'id',
        'staff_name.name',
        'role.title',
        'wage',
        'payment_record.name',
        'month_year',
        'staff_perfomance.name',
        'recommendation.name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function staffName()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function paymentRecord()
    {
        return $this->belongsTo(StaffPaymentRecord::class);
    }

    public function staffPerfomance()
    {
        return $this->belongsTo(StaffPerfomance::class);
    }

    public function recommendation()
    {
        return $this->belongsToMany(StaffRecommendation::class);
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
