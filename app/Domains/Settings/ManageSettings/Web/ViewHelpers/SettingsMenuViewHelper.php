<?php

namespace App\Domains\Settings\ManageSettings\Web\ViewHelpers;

use App\Models\Member;
use App\Models\Permission;

class SettingsMenuViewHelper
{
    public static function data(Member $member): array
    {
        return [
            'can_see_permissions' => $member->hasTheRightTo(Permission::ORGANIZATION_MANAGE_PERMISSIONS),
            'can_see_offices' => $member->hasTheRightTo(Permission::ORGANIZATION_MANAGE_OFFICES),
        ];
    }
}
