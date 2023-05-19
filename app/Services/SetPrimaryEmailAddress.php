<?php

namespace App\Services;

use App\Mail\VerifyEmail;
use App\Models\EmailAddress;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SetPrimaryEmailAddress extends BaseService
{
    private EmailAddress $emailAddress;

    /**
     * Get the validation rules that apply to the service.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'email_address_id' => 'required|integer|exists:email_addresses,id',
        ];
    }

    /**
     * Set the primary email address of the user.
     * Obviously, the email address must belong to the user.
     */
    public function execute(array $data): void
    {
        $this->validateRules($data);

        $user = User::findOrFail($data['user_id']);
        $user->emails()->findOrFail($data['email_address_id']);

        $user->primary_email_address_id = $data['email_address_id'];
        $user->save();
    }
}
