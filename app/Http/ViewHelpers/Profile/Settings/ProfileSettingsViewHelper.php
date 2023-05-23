<?php

namespace App\Http\ViewHelpers\Profile\Settings;

use App\Domains\Settings\ManageSettings\Web\ViewHelpers\SettingsIndexViewHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ProfileSettingsViewHelper
{
    public static function index(User $user): array
    {
        return [
            'firstName' => $user->first_name,
            'lastName' => $user->last_name,
            'username' => $user->username,
            'timezone' => $user->timezone,
            'locale' => $user->locale,
            'agePreferences' => $user->age_preferences,
        ];
    }
}
