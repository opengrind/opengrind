<?php

namespace App\Services;

use App\Models\Team;

class CreateTeam extends BaseService
{
    private array $data;

    public function rules(): array
    {
        return [
            'author_id' => 'required|integer|exists:members,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'office_id' => 'nullable|integer|exists:offices,id',
            'team_lead_id' => 'nullable|integer|exists:members,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:65535',
        ];
    }

    public function execute(array $data): Team
    {
        $this->data = $data;
        $this->validate();

        $team = Team::create([
            'organization_id' => $this->organization->id,
            'office_id' => $this->valueOrNull($data, 'office_id'),
            'team_lead_id' => $this->valueOrNull($data, 'team_lead_id'),
            'name' => $data['name'],
            'description' => $this->valueOrNull($data, 'description'),
        ]);

        return $team;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        if (! is_null($this->data['office_id'])) {
            $this->organization->offices()->findOrFail($this->data['office_id']);
        }

        if (! is_null($this->data['team_lead_id'])) {
            $this->organization->members()->findOrFail($this->data['team_lead_id']);
        }
    }
}
