<?php

namespace Notifier\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Notifier\Interfaces\Exceptions\ResponseExceptionInterface;

/**
 * Class InternalServerException
 * @package Notifier\Exceptions
 */
class InternalServerException extends Exception implements ResponseExceptionInterface
{
    /** @var string */
    protected $message = "Internal server error.";
    /** @var int */
    protected $code = Response::HTTP_INTERNAL_SERVER_ERROR;
    /** @var array */
    private $errors = [];

    /**
     * @param string $message
     * @return ResponseExceptionInterface
     */
    public function setMessage(string $message): ResponseExceptionInterface
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     * @return ResponseExceptionInterface
     */
    public function setErrors(array $errors): ResponseExceptionInterface
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @param string $error
     * @return ResponseExceptionInterface
     */
    public function addError(string $error): ResponseExceptionInterface
    {
        $this->errors[] = $error;
        return $this;
    }
}
