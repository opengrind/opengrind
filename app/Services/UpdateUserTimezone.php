<?php

namespace App\Services;

use App\Models\User;

class UpdateUserTimezone extends BaseService
{
    private array $data;

    private User $user;

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'timezone' => 'required|string|max:255',
        ];
    }

    /**
     * Update the user's timezone.
     */
    public function execute(array $data): User
    {
        $this->data = $data;
        $this->validate();

        $this->user->timezone = $data['timezone'];
        $this->user->save();

        return $this->user;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->user = User::findOrFail($this->data['user_id']);
    }
}
