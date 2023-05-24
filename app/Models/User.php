<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const AGE_HIDDEN = 'hidden';

    public const AGE_ONLY_MONTH_DAY = 'month_day';

    public const AGE_FULL = 'full';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'primary_email_address_id',
        'slug',
        'first_name',
        'last_name',
        'password',
        'locale',
        'timezone',
        'born_at',
        'age_preferences',
        'has_public_profile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'born_at' => 'datetime',
        'has_public_profile' => 'boolean',
    ];

    public function emails(): HasMany
    {
        return $this->hasMany(EmailAddress::class);
    }

    public function primaryEmail(): BelongsTo
    {
        return $this->belongsTo(EmailAddress::class, 'primary_email_address_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function projects(): MorphMany
    {
        return $this->morphMany(Project::class, 'projectable');
    }

    public function isMemberOfOrganization(Organization $organization): bool
    {
        return $this->members()->get()->contains(
            fn (Member $member) => $member->organization_id === $organization->id
        );
    }

    protected function age(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (is_null($attributes['born_at'])) {
                    return null;
                }

                $date = Carbon::parse($attributes['born_at']);

                if ($attributes['age_preferences'] === self::AGE_HIDDEN) {
                    return null;
                }

                if ($attributes['age_preferences'] === self::AGE_ONLY_MONTH_DAY) {
                    return $date->isoFormat(trans('format.month_day'));
                }

                return $date->isoFormat(trans('format.year_month_day')).' ('.$date->age.')';
            }
        );
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (is_null($this->primaryEmail)) {
                    return null;
                }

                return $this->primaryEmail->email;
            }
        );
    }
}
