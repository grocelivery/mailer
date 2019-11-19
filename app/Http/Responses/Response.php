<?php

namespace Notifier\Http\Responses;

use Illuminate\Http\JsonResponse;
use Notifier\Interfaces\Http\Responses\ResponseInterface;

/**
 * Class Response
 * @package Notifier\Http\Responses
 */
class Response extends JsonResponse implements ResponseInterface
{
    /** @var array */
    private $body = [];
    /** @var array */
    private $errors = [];

    /**
     * @return array
     */
    public function all(): array
    {
        if (!empty($this->body)) {
            $data['body'] = $this->body;
        }

        $data['errors'] = $this->errors;

        return $data;
    }

    /**
     * @param array $body
     * @return ResponseInterface
     */
    public function setBody(array $body): ResponseInterface
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @param string $key
     * @param $value
     * @return ResponseInterface
     */
    public function add(string $key, $value): ResponseInterface
    {
        $this->body[$key] = $value;
        return $this;
    }

    /**
     * @param array $errors
     * @return ResponseInterface
     */
    public function setErrors(array $errors): ResponseInterface
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @param string $error
     * @return ResponseInterface
     */
    public function addError(string $error): ResponseInterface
    {
        $this->errors[] = $error;
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
     * @return int
     */
    public function countErrors(): int
    {
        return count($this->getErrors());
    }

    /**
     * @return bool
     */
    public function hasErrors(): bool
    {
        return $this->countErrors() !== 0;
    }

    /**
     * @return JsonResponse
     */
    public function send(): JsonResponse
    {
        $this->prepareData();
        return parent::send();
    }

    protected function prepareData(): void
    {
        $this->data = json_encode($this->all(), $this->encodingOptions);
        $this->update();
    }
}
