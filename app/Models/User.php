<?php

namespace App\Models;

use App\Models\UserAlert;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasLocalePreference, MustVerifyEmail, HasMedia
{
    use HasFactory, HasAdvancedFilter, Notifiable, SoftDeletes, InteractsWithMedia, Auditable;

    public $table = 'users';

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $appends = [
        'profile_picture',
        'identification_copy',
        'other_files',
    ];

    public const IDENTIFICATION_SELECT = [
        'national_id' => 'National ID',
        'lc_letter'   => 'LC Letter',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'date_of_birth',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'locale',
        'date_of_birth',
        'identification',
        'emergency_contact_1',
        'emergency_contact_2',
        'emergency_contact_3',
        'district',
        'parish',
        'village',
        'sub_county',
        'other_health_condition',
        'other_spiritual_affiliation',
        'other_skill',
        'notes',
        'is_approved',
    ];

    public $orderable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'locale',
        'date_of_birth',
        'identification',
        'emergency_contact_1',
        'emergency_contact_2',
        'emergency_contact_3',
        'district',
        'parish',
        'village',
        'sub_county',
        'other_health_condition',
        'other_spiritual_affiliation',
        'other_skill',
        'notes',
        'is_approved',
    ];

    public $filterable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'roles.title',
        'locale',
        'date_of_birth',
        'identification',
        'emergency_contact_1',
        'emergency_contact_2',
        'emergency_contact_3',
        'district',
        'parish',
        'village',
        'sub_county',
        'health_condition.title',
        'other_health_condition',
        'spiritual_affiliation.title',
        'other_spiritual_affiliation',
        'skill.title',
        'other_skill',
        'notes',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function alerts()
    {
        return $this->belongsToMany(UserAlert::class)->withPivot('seen_at');
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getProfilePictureAttribute()
    {
        return $this->getMedia('user_profile_picture')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getIdentificationLabelAttribute($value)
    {
        return static::IDENTIFICATION_SELECT[$this->identification] ?? null;
    }

    public function getIdentificationCopyAttribute()
    {
        return $this->getMedia('user_identification_copy')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function healthCondition()
    {
        return $this->belongsToMany(HealthCondition::class);
    }

    public function spiritualAffiliation()
    {
        return $this->belongsToMany(SpiritialAffiliation::class);
    }

    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function getOtherFilesAttribute()
    {
        return $this->getMedia('user_other_files')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
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
