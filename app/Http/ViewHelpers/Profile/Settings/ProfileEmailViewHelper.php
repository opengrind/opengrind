<?php

namespace App\Http\ViewHelpers\Profile\Settings;

use App\Models\EmailAddress;
use App\Models\User;

class ProfileEmailViewHelper
{
    public static function index(User $user): array
    {
        $emails = $user->emails()->get()
            ->map(fn (EmailAddress $email) => self::dtoEmailAddress($email, $user));

        $verifiedEmails = $emails->filter(fn (array $email) => $email['isVerified']);

        return [
            'emails' => $emails,
            'verifiedEmails' => $verifiedEmails,
            'primaryEmail' => self::dtoEmailAddress($user->primaryEmail, $user),
        ];
    }

    public static function dtoEmailAddress(EmailAddress $emailAddress, User $user): array
    {
        return [
            'id' => $emailAddress->id,
            'email' => $emailAddress->email,
            'isVerified' => ! is_null($emailAddress->email_verified_at),
            'canBeDeleted' => $user->emails()->count() > 1 && $emailAddress->id !== $user->primaryEmail->id,
        ];
    }
}
