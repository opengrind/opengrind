<?php

namespace App\Services;

use App\Models\Organization;
use Illuminate\Support\Str;
use App\Models\User;
use Exception;
use Illuminate\Validation\ValidationException;

class UpdateUserDateOfBirth extends BaseService
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
            'born_at' => 'required|date_format:Y-m-d',
            'age_preferences' => 'required|string',
        ];
    }

    /**
     * Update the user's date of birth.
     */
    public function execute(array $data): User
    {
        $this->data = $data;
        $this->validate();

        $this->user->born_at = $data['born_at'];
        $this->user->age_preferences = $data['age_preferences'];
        $this->user->save();

        return $this->user;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->user = User::findOrFail($this->data['user_id']);
    }
}
