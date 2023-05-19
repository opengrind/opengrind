<?php

namespace App\Services;

use App\Models\Office;
use App\Models\Permission;

class DestroyOffice extends BaseService
{
    public function rules(): array
    {
        return [
            'author_id' => 'required|integer|exists:members,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'office_id' => 'required|integer|exists:offices,id',
        ];
    }

    public function permissions(): string
    {
        return Permission::ORGANIZATION_MANAGE_OFFICES;
    }

    public function execute(array $data): void
    {
        $this->validateRules($data);

        $office = Office::where('organization_id', $this->author->organization_id)
            ->findOrFail($data['office_id']);

        $office->delete();
    }
}
