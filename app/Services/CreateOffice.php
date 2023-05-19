<?php

namespace App\Services;

use App\Models\Office;
use App\Models\Permission;

class CreateOffice extends BaseService
{
    private Office $office;

    private array $data;

    public function rules(): array
    {
        return [
            'author_id' => 'required|integer|exists:members,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'name' => 'required|string|max:255',
            'is_main_office' => 'required|boolean',
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
            'organization_id' => $this->organization->id,
            'name' => $data['name'],
            'is_main_office' => $data['is_main_office'],
        ]);

        $this->toggleMainOfficeForAllTheOtherOffices();

        return $this->office;
    }

    private function toggleMainOfficeForAllTheOtherOffices(): void
    {
        if ($this->data['is_main_office']) {
            Office::where('organization_id', $this->author->organization_id)
                ->whereNot('id', $this->office->id)
                ->update([
                    'is_main_office' => false,
                ]);
        }
    }
}
