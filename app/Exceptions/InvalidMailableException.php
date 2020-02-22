<?php

namespace Grocelivery\Mailer\Exceptions;

use Grocelivery\Utils\Exceptions\BadRequestException;

/**
 * Class InvalidMailableException
 * @package Grocelivery\Mailer\Exceptions
 */
class InvalidMailableException extends BadRequestException
{
    /** @var string */
    protected $message = "Mailable with provided name is not registered.";
}