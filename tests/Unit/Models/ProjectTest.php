<?php

namespace Tests\Unit\Models;

use App\Models\Organization;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_a_user(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create();

        $project->projectable_id = $user->id;
        $project->projectable_type = User::class;
        $project->save();

        $this->assertTrue($project->projectable()->exists());
    }

    /** @test */
    public function it_belongs_to_an_organization(): void
    {
        $organization = Organization::factory()->create();
        $project = Project::factory()->create();

        $project->projectable_id = $organization->id;
        $project->projectable_type = Organization::class;
        $project->save();

        $this->assertTrue($project->projectable()->exists());
    }
}
