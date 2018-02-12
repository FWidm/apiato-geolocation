<?php

namespace App\Containers\GeoLocation\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class GeoLocationCreationException extends Exception
{
    public $httpStatusCode = Response::HTTP_BAD_REQUEST;

    public $message = 'Could not create a new GeoLocation Object.';
}
