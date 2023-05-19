<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory, Translatable;

    public const ORGANIZATION_MANAGE_PERMISSIONS = 'organization.permissions';

    public const ORGANIZATION_MANAGE_PROJECTS = 'organization.projects';

    public const ORGANIZATION_MANAGE_USERS = 'organization.users';

    public const ORGANIZATION_MANAGE_OFFICES = 'organization.offices';

    public const ORGANIZATION_ADD_MEMBERS = 'organization.members.add';

    public const ORGANIZATION_MANAGE_TEAMS = 'organization.teams';

    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'action',
        'label_translation_key',
        'label',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'permission_role', 'permission_id', 'role_id')->withPivot('active');
    }
}
