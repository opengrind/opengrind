<?php

namespace App\Services;

use App\Models\User;

class UpdateUserProfileVisibility extends BaseService
{
    private array $data;

    private User $user;

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'has_public_profile' => 'required|boolean',
        ];
    }

    /**
     * Update the user's visibility.
     * This is used to determine if the user's profile is public or not.
     */
    public function execute(array $data): User
    {
        $this->data = $data;
        $this->validate();

        $this->user->has_public_profile = $data['has_public_profile'];
        $this->user->save();

        return $this->user;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->user = User::findOrFail($this->data['user_id']);
    }
}
