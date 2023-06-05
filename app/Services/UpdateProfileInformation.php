<?php

namespace App\Services;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class UpdateProfileInformation extends BaseService
{
    private array $data;

    private User $user;

    private string $slug;

    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|alpha_dash',
        ];
    }

    /**
     * Update the information about the user.
     */
    public function execute(array $data): User
    {
        $this->data = $data;
        $this->validate();

        $this->user->first_name = $data['first_name'];
        $this->user->last_name = $data['last_name'];
        $this->user->username = $data['username'];
        $this->user->slug = $this->slug;
        $this->user->save();

        return $this->user;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->user = User::findOrFail($this->data['user_id']);

        $this->slug = Str::slug($this->data['username']);

        if ($this->user->username === $this->data['username']) {
            return;
        }

        if (Organization::where('slug', $this->slug)->exists()) {
            throw ValidationException::withMessages([
                'username' => __('This name already exists'),
            ]);
        }

        if (User::where('slug', $this->slug)->exists()) {
            throw ValidationException::withMessages([
                'username' => __('This name already exists'),
            ]);
        }

        if (in_array($this->slug, config('opengrind.blacklisted'))) {
            throw ValidationException::withMessages([
                'username' => __('This name already exists'),
            ]);
        }
    }
}
