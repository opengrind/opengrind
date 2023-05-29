<?php

namespace App\Helpers;

use App\Models\MultiAvatar;

class AvatarHelper
{
    /**
     * Generate a new random avatar.
     *
     * The Multiavatar library takes a name to generate a unique avatar.
     */
    public static function generateRandomAvatar(string $name): string
    {
        $multiavatar = new MultiAvatar();

        return $multiavatar($name, null, null);
    }
}
