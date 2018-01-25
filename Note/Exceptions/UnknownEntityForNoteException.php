<?php

namespace App\Containers\Note\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UnknownEntityForNoteException
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class UnknownEntityForNoteException extends Exception
{
    public $httpStatusCode = Response::HTTP_INTERNAL_SERVER_ERROR;

    public $message = 'Could not resolve the corresponding Relationship Class!';
}
