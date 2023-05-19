<?php

namespace App\Domains\Settings\ManageOffices\Web\ViewHelpers;

use App\Models\Office;
use App\Models\Organization;

class SettingsOfficeIndexViewHelper
{
    public static function data(Organization $organization): array
    {
        $offices = $organization->offices()
            ->orderBy('name')
            ->get()
            ->map(fn (Office $office) => self::dto($office));

        return [
            'offices' => $offices,
        ];
    }

    public static function dto(Office $office): array
    {
        return [
            'id' => $office->id,
            'name' => $office->name,
            'is_main_office' => $office->is_main_office,
        ];
    }
}
