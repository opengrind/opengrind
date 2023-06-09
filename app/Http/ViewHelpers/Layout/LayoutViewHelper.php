<?php

namespace App\Http\ViewHelpers\Layout;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class LayoutViewHelper
{
    public static function data(): array
    {
        $localesCollection = collect();
        $localesCollection->push([
            'name' => 'English',
            'shortCode' => 'en',
            'url' => route('locale.update', ['locale' => 'en']),
        ]);
        $localesCollection->push([
            'name' => 'Français',
            'shortCode' => 'fr',
            'url' => route('locale.update', ['locale' => 'fr']),
        ]);

        // current organization for the logged user
        $organization = null;
        // if (auth()->check()) {
        //     $organization = auth()->user()->organization;
        // }

        return [
            'currentLocale' => App::currentLocale(),
            'locales' => $localesCollection,
            'currentYear' => Carbon::now()->format('Y'),
            'organization' => [
                'name' => $organization?->name,
            ],
            'url' => [
                'search' => null,
            ],
        ];
    }
}
