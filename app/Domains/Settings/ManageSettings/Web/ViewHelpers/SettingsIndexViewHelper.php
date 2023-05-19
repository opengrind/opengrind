<?php

namespace App\Domains\Settings\ManageSettings\Web\ViewHelpers;

use App\Models\User;

class SettingsIndexViewHelper
{
    public static function data(User $user): array
    {
        return [
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'email' => $user->email,
        ];
    }
}
