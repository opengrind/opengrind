<?php

namespace App\Services;

use App\Models\User;

class GenerateNewUserDefaultAvatar extends BaseService
{
    private array $data;

    private User $user;

    /**
     * Get the validation rules that apply to the service.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    /**
     * Update the user's default avatar.
     * The default avatar is based on the username.
     * This method creates a new random username so the avatar looks different.
     */
    public function execute(array $data): User
    {
        $this->data = $data;
        $this->validate();

        $this->user->username_avatar = fake()->name;
        $this->user->save();

        return $this->user;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->user = User::findOrFail($this->data['user_id']);
    }
}
