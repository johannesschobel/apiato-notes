<?php

namespace App\Containers\Note\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NotAllowedToAccessEntityOfNoteException
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class NotAllowedToAccessEntityOfNoteException extends Exception
{
    public $httpStatusCode = Response::HTTP_FORBIDDEN;

    public $message = 'You are not allowed to access the entity for this note!';

    public $code = 0;
}
