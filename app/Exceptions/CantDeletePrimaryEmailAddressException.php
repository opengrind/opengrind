<?php

namespace App\Exceptions;

use Exception;

class CantDeletePrimaryEmailAddressException extends Exception
{
    public function __construct($message = 'You can not delete the primary email address of an account.')
    {
        parent::__construct($message);
    }
}
