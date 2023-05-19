<?php

namespace App\Services;

use App\Models\IssueType;
use App\Models\Office;
use App\Models\Permission;

class CreateIssueType extends BaseService
{
    private IssueType $issueType;

    private array $data;

    public function rules(): array
    {
        return [
            'author_id' => 'required|integer|exists:members,id',
            'label' => 'required|string|max:255',
            'emoji' => 'required|string|max:5',
        ];
    }

    public function permissions(): string
    {
        return Permission::ORGANIZATION_MANAGE_OFFICES;
    }

    public function execute(array $data): Office
    {
        $this->validateRules($data);
        $this->data = $data;

        $this->office = Office::create([
            'organization_id' => $this->author->organization_id,
            'name' => $data['name'],
            'is_main_office' => $data['is_main_office'],
        ]);

        return $this->issueType;
    }
}
