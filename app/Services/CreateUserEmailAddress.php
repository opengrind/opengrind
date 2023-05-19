<?php

namespace App\Services;

use App\Mail\VerifyEmail;
use App\Models\EmailAddress;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CreateUserEmailAddress extends BaseService
{
    private EmailAddress $emailAddress;

    /**
     * Get the validation rules that apply to the service.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'email' => 'required|unique:email_addresses,email|email|max:255',
        ];
    }

    /**
     * Create an email address for the user.
     */
    public function execute(array $data): EmailAddress
    {
        $this->validateRules($data);

        $this->emailAddress = EmailAddress::create([
            'user_id' => $data['user_id'],
            'email' => $data['email'],
        ]);

        $this->sendConfirmationEmail();

        return $this->emailAddress;
    }

    private function sendConfirmationEmail(): void
    {
        Mail::to($this->emailAddress)
            ->queue(new VerifyEmail($this->emailAddress));
    }
}
