<?php

namespace Notifier\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Notifier\Http\Responses\Response as JsonResponse;
use Notifier\Interfaces\Http\Responses\ResponseInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Handler
 * @package Notifier\Exceptions
 */
class Handler extends ExceptionHandler
{
    /** @var JsonResponse */
    protected $response;
    /** @var array */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Handler constructor.
     * @param JsonResponse $response
     */
    public function __construct(JsonResponse $response)
    {
        $this->response = $response;
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
     * @return mixed
     */
    public function render($request, Exception $exception)
    {
        $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        $error = '';

        if ($exception instanceof NotFoundHttpException) {
            $status = Response::HTTP_NOT_FOUND;
            $error = 'Route not found.';
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            $status = Response::HTTP_METHOD_NOT_ALLOWED;
            $error = 'Method not allowed.';
        }

        if ($exception instanceof InternalServerException) {
            $status = $exception->getCode();
            $error = $exception->getMessage();
        }

        if (empty($error)) {
            $error = !empty($exception->getMessage()) ? $exception->getMessage() : 'Internal server error.';
        }

        return $this->response
            ->setStatusCode($status)
            ->addError($error);
    }
}
