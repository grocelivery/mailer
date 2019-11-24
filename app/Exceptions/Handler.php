<?php

namespace Grocelivery\Notifier\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Grocelivery\Utils\Interfaces\JsonResponseInterface as JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Grocelivery\Utils\Exceptions\ErrorRenderer;

/**
 * Class Handler
 * @package Notifier\Exceptions
 */
class Handler extends ExceptionHandler
{
    /** @var ErrorRenderer */
    protected $errorRenderer;
    /** @var array */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    public function __construct(ErrorRenderer $errorRenderer)
    {
        $this->errorRenderer = $errorRenderer;
    }

    /**
     * @param Exception $exception
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param Request $request
     * @param Exception $exception
     * @return JsonResponse
     */
    public function render($request, Exception $exception): JsonResponse
    {
        return $this->errorRenderer->render($request, $exception);
    }
}
