<?php

namespace App\Http\ViewHelpers\Layout;

use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class LayoutViewHelper
{
    public static function data(Organization $organization = null): array
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

        return [
            'currentLocale' => App::currentLocale(),
            'locales' => $localesCollection,
            'currentYear' => Carbon::now()->format('Y'),
            'organization' => [
                'id' => $organization?->id,
                'name' => $organization?->name,
                'slug' => $organization?->slug,
            ],
            'url' => [
                'search' => null,
            ],
        ];
    }
}
