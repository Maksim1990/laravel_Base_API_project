<?php
namespace App\Services\SMS;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class SMSException extends Exception{

    public function __construct($message = null)
    {
        parent::__construct($message, Response::HTTP_BAD_REQUEST);
    }
}