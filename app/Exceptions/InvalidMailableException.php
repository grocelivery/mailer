<?php

namespace Grocelivery\Notifier\Exceptions;

use Grocelivery\Utils\Exceptions\BadRequestException;

/**
 * Class InvalidMailableException
 * @package Grocelivery\Notifier\Exceptions
 */
class InvalidMailableException extends BadRequestException
{
    /** @var string */
    protected $message = "Mailable with provided name is not registered.";
}