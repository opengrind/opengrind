<?php

namespace App\Services;

use App\Exceptions\NotEnoughPermissionException;
use App\Models\Member;
use App\Models\Organization;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

abstract class BaseService
{
    public Member $author;

    public Organization $organization;

    /**
     * Get the validation rules that apply to the service.
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Get the permissions that users need to execute the service.
     */
    public function permissions(): string
    {
        return '';
    }

    /**
     * Validate an array against a set of rules.
     */
    public function validateRules(array $data): bool
    {
        Validator::make($data, $this->rules())->validate();

        if ($this->permissions() !== '') {
            $this->author = Member::findOrFail($data['author_id']);
            $this->organization = Organization::findOrFail($data['organization_id']);

            if ($this->author->organization_id !== $data['organization_id']) {
                throw new ModelNotFoundException();
            }

            if (! $this->author->hasTheRightTo($this->permissions())) {
                throw new NotEnoughPermissionException();
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
}
