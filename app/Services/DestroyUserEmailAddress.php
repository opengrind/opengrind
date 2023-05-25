<?php

namespace App\Services;

use App\Exceptions\CantDeletePrimaryEmailAddressException;
use App\Models\User;

class DestroyUserEmailAddress extends BaseService
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'email_id' => 'required|integer|exists:email_addresses,id',
        ];
    }

    public function execute(array $data): void
    {
        $this->validateRules($data);

        $user = User::findOrFail($data['user_id']);

        $emailAddress = $user->emails()->findOrFail($data['email_id']);

        if ($user->primary_email_address_id === $emailAddress->id) {
            throw new CantDeletePrimaryEmailAddressException();
        }

        $emailAddress->delete();
    }
}
