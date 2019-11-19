<?php

namespace Notifier\Interfaces\Http\Responses;

/**
 * Interface ResponseInterface
 * @package Notifier\Interfaces\Http\Responses
 */
interface ResponseInterface
{
    /**
     * @param array $body
     * @return ResponseInterface
     */
    public function setBody(array $body): ResponseInterface;

    /**
     * @param string $key
     * @param $value
     * @return ResponseInterface
     */
    public function add(string $key, $value): ResponseInterface;

    /**
     * @param array $errors
     * @return ResponseInterface
     */
    public function setErrors(array $errors): ResponseInterface;

    /**
     * @param string $error
     * @return ResponseInterface
     */
    public function addError(string $error): ResponseInterface;
}
