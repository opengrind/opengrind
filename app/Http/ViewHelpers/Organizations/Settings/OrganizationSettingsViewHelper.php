<?php

namespace App\Http\ViewHelpers\Organizations\Settings;

use App\Models\Organization;

class OrganizationSettingsViewHelper
{
    public static function index(Organization $organization): array
    {
        return [
            'id' => $organization->id,
            'name' => $organization->name,
            'description' => $organization->description,
        ];
    }
}
