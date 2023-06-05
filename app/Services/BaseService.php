<?php

namespace App\Services;

use App\Exceptions\NotEnoughPermissionException;
use App\Models\Member;
use App\Models\Organization;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

abstract class BaseService
{
    public Member $author;

    public Organization $organization;

    public function rules(): array
    {
        return [];
    }

    /**
     * Get the permissions that users need to execute the service.
     */
    public function permissions(): array
    {
        return [];
    }

    /**
     * Validate an array against a set of rules.
     */
    public function validateRules(array $data): bool
    {
        Validator::make($data, $this->rules())->validate();

        if ($this->permissions() !== []) {
            if (in_array('user_must_belong_to_organization', $this->permissions())) {
                $this->validateAuthorBelongsToOrganization($data);
            }

            if (in_array('author_must_have_the_right_to_edit_organization_information', $this->permissions())) {
                if (! $this->author->hasTheRightTo(Permission::ORGANIZATION_MANAGE_INFORMATION)) {
                    throw new NotEnoughPermissionException();
                }
            }

            if (in_array('user_must_have_the_right_to_edit_organization_roles', $this->permissions())) {
                if (! $this->author->hasTheRightTo(Permission::ORGANIZATION_MANAGE_PERMISSIONS)) {
                    throw new NotEnoughPermissionException();
                }
            }
        }

        return true;
    }

    public function valueOrNull($data, $index)
    {
        if (empty($data[$index])) {
            return;
        }

        return $data[$index] == '' ? null : $data[$index];
    }

    /**
     * Validate that the author of the action belongs to the organization.
     */
    private function validateAuthorBelongsToOrganization(array $data): void
    {
        $this->author = Member::where('organization_id', $data['organization_id'])
            ->where('user_id', $data['user_id'])
            ->firstOrFail();

        $this->organization = Organization::findOrFail($data['organization_id']);
    }
}
