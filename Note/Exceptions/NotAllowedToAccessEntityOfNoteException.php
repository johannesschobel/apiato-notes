<?php

namespace App\Containers\Note\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class NotAllowedToAccessEntityOfNoteException extends Exception
{
    public $httpStatusCode = Response::HTTP_FORBIDDEN;

    public $message = 'You are not allowed to access the entity for this note!';

    public $code = 0;
}
