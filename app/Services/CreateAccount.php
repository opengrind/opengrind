<?php

namespace App\Services;

use App\Models\Account;
use App\Models\EmailAddress;
use App\Models\Organization;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAccount extends BaseService
{
    private User $user;

    private EmailAddress $emailAddress;

    private array $data;

    private string $slug;

    /**
     * Get the validation rules that apply to the service.
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:email_addresses,email|email|max:255',
            'password' => 'required|min:6|max:60',
            'username' => 'required|unique:users,username|string|max:255|alpha_dash',
        ];
    }

    /**
     * Create an account for the user.
     */
    public function execute(array $data): User
    {
        $this->data = $data;

        $this->validate();
        $this->createUser();
        $this->createEmail();

        return $this->user;
    }

    private function validate(): void
    {
        $this->validateRules($this->data);

        $this->slug = Str::slug($this->data['username']);

        if (Organization::where('slug', $this->slug)->exists()) {
            throw new Exception(trans('This name already exists'));
        }

        if (User::where('slug', $this->slug)->exists()) {
            throw new Exception(trans('This name already exists'));
        }

        if (in_array($this->slug, config('opengrind.blacklisted'))) {
            throw new Exception(trans('This name already exists'));
        }
    }

    private function createUser(): void
    {
        $this->user = User::create([
            'username' => $this->data['username'],
            'username_avatar' => $this->data['username'],
            'password' => Hash::make($this->data['password']),
            'slug' => $this->slug,
        ]);
    }

    private function createEmail(): void
    {
        $this->emailAddress = (new CreateUserEmailAddress())->execute([
            'user_id' => $this->user->id,
            'email' => $this->data['email'],
        ]);

        $this->user->primary_email_address_id = $this->emailAddress->id;
        $this->user->save();
    }
}
