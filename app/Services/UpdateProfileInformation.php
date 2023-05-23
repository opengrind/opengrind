<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\ValidationException;

class UpdateProfileInformation extends BaseService
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
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'username' => 'required|unique:users,username|string|max:255|alpha_dash',
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
        $this->user->save();

        // if ($oldEmail !== $data['email']) {
        //     if (User::where('email', $data['email'])->exists()) {
        //         throw ValidationException::withMessages([
        //             'email' => __('This email has already been taken.'),
        //         ]);
        //     }

        //     $user->email = $data['email'];
        //     $user->email_verified_at = null;
        //     $user->save();
        //     $user->refresh()->sendEmailVerificationNotification();
        // }

        return $this->user;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->user = User::findOrFail($this->data['user_id']);
        // $oldEmail = $this->user->email;

        // if ($oldEmail !== $this->data['email']) {
        //     if (User::where('email', $this->data['email'])->exists()) {
        //         throw ValidationException::withMessages([
        //             'email' => __('This email has already been taken.'),
        //         ]);
        //     }

        //     $this->user->email = $data['email'];
        //     $this->user->email_verified_at = null;
        //     $this->user->save();
        //     $this->user->refresh()->sendEmailVerificationNotification();
        // }
    }
}
