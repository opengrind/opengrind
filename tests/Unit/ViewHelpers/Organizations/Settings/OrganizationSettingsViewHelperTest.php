<?php

namespace Tests\Unit\ViewHelpers\Organizations\Settings;

use App\Http\ViewHelpers\Organizations\Settings\OrganizationSettingsViewHelper;
use App\Models\Organization;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrganizationSettingsViewHelperTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_view(): void
    {
        $organization = Organization::factory()->create([
            'name' => 'dunder',
            'description' => 'boudin',
        ]);

        $viewModel = OrganizationSettingsViewHelper::index($organization);

        $this->assertCount(
            3,
            $viewModel
        );

        $this->assertEquals(
            $organization->id,
            $viewModel['id']
        );
        $this->assertEquals(
            'boudin',
            $viewModel['description']
        );
        $this->assertEquals(
            'dunder',
            $viewModel['name']
        );
    }
}
