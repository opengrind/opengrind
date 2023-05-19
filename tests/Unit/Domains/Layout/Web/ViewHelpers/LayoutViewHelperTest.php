<?php

namespace Tests\Unit\Domains\Layout\Web\ViewHelpers;

use App\Domains\Layout\Web\ViewHelpers\LayoutViewHelper;
use App\Models\Member;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LayoutViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_view(): void
    {
        Carbon::setTestNow(Carbon::create(2023, 1, 1));
        $organization = Organization::factory()->create([
            'name' => 'Organization name',
        ]);
        $member = Member::factory()->create([
            'organization_id' => $organization->id,
        ]);
        $this->be($member->user);

        $array = LayoutViewHelper::data();

        $this->assertEquals(
            5,
            count($array)
        );

        $this->assertArrayHasKey('currentLocale', $array);
        $this->assertArrayHasKey('locales', $array);
        $this->assertArrayHasKey('currentYear', $array);
        $this->assertArrayHasKey('organization', $array);

        $this->assertEquals(
            'en',
            $array['currentLocale']
        );
        $this->assertEquals(
            [
                0 => [
                    'name' => 'English',
                    'shortCode' => 'en',
                    'url' => config('app.url').'/locale/en',
                ],
                1 => [
                    'name' => 'Français',
                    'shortCode' => 'fr',
                    'url' => config('app.url').'/locale/fr',
                ],
            ],
            $array['locales']->toArray()
        );
        $this->assertEquals(
            2023,
            $array['currentYear']
        );
        // $this->assertEquals(
        //     [
        //         'name' => 'Organization name',
        //     ],
        //     $array['organization']
        // );
        $this->assertEquals(
            [
                'search' => env('APP_URL').'/search',
            ],
            $array['url']
        );
    }
}
