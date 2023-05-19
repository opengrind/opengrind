<?php

namespace App\Domains\Search\Web\ViewHelpers;

use App\Models\Office;
use App\Models\Organization;
use Illuminate\Support\Collection;

class SearchIndexViewHelper
{
    public static function data(Organization $organization, string $term = null): array
    {
        return [
            'offices' => $term ? self::offices($organization, $term) : [],
        ];
    }

    private static function offices(Organization $organization, string $term): Collection
    {
        /** @var Collection<int, Office> */
        $offices = Office::search($term)
            ->where('organization_id', $organization->id)
            ->get();

        return $offices->map(fn (Office $office) => [
            'id' => $office->id,
            'name' => $office->name,
        ]);
    }
}
