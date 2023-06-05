<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UpdateOrganizationInformation extends BaseService
{
    private array $data;

    private string $slug;

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'organization_id' => 'required|integer|exists:organizations,id',
            'name' => 'required|string|max:255|alpha_dash',
            'description' => 'nullable|string|max:255',
        ];
    }

    public function permissions(): array
    {
        return [
            'user_must_belong_to_organization',
            'author_must_have_the_right_to_edit_organization_information',
        ];
    }

    public function execute(array $data): Organization
    {
        $this->data = $data;
        $this->validate();

        $this->organization->name = $data['name'];
        $this->organization->description = $this->valueOrNull($data, 'description');
        $this->organization->slug = $this->slug;
        $this->organization->save();

        return $this->organization;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->slug = Str::slug($this->data['name']);

        if ($this->organization->name === $this->data['name']) {
            return;
        }

        if (Organization::where('slug', $this->slug)->exists()) {
            throw ValidationException::withMessages([
                'name' => __('This name already exists'),
            ]);
        }

        if (User::where('slug', $this->slug)->exists()) {
            throw ValidationException::withMessages([
                'name' => __('This name already exists'),
            ]);
        }

        if (in_array($this->slug, config('opengrind.blacklisted'))) {
            throw ValidationException::withMessages([
                'name' => __('This name already exists'),
            ]);
        }
    }
}
