<?php

namespace Tests\Unit\Domains\Settings\ManageOffices\Web\ViewHelpers;

use App\Domains\Settings\ManageOffices\Web\ViewHelpers\SettingsOfficeIndexViewHelper;
use App\Models\office;
use App\Models\Organization;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SettingsOfficeIndexViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_view(): void
    {
        $organization = Organization::factory()->create();
        $office = Office::create([
            'organization_id' => $organization->id,
            'name' => 'HQ',
        ]);

        $viewModel = SettingsOfficeIndexViewHelper::data($organization);

        $this->assertArrayHasKey('offices', $viewModel);
    }

    /** @test */
    public function it_gets_the_data_needed_for_the_office(): void
    {
        $organization = Organization::factory()->create();
        $office = Office::create([
            'organization_id' => $organization->id,
            'name' => 'HQ',
            'is_main_office' => true,
        ]);

        $array = SettingsOfficeIndexViewHelper::dto($office);

        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('name', $array);
        $this->assertArrayHasKey('is_main_office', $array);

        $this->assertEquals(
            $office->id,
            $array['id']
        );
        $this->assertEquals(
            'HQ',
            $array['name']
        );
        $this->assertEquals(
            true,
            $array['is_main_office']
        );
    }
}
