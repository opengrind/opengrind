<?php

namespace Tests\Unit\Models;

use App\Models\Member;
use App\Models\Office;
use App\Models\Team;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TeamTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_one_organization()
    {
        $team = Team::factory()->create();
        $this->assertTrue($team->organization()->exists());
    }

    /** @test */
    public function it_belongs_to_one_team()
    {
        $team = Team::factory()->create();
        $otherTeam = Team::factory()->create([
            'parent_team_id' => $team->id,
        ]);

        $this->assertTrue($otherTeam->parentTeam()->exists());
    }

    /** @test */
    public function it_belongs_to_one_office()
    {
        $office = Office::factory()->create();
        $team = Team::factory()->create([
            'office_id' => $office->id,
        ]);

        $this->assertTrue($team->office()->exists());
    }

    /** @test */
    public function it_belongs_to_one_member_as_team_lead()
    {
        $member = Member::factory()->create();
        $team = Team::factory()->create([
            'team_lead_id' => $member->id,
        ]);

        $this->assertTrue($team->teamLead()->exists());
    }
}
