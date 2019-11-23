<?php

namespace Grocelivery\Notifier\Http\Controllers;

use Grocelivery\HttpUtils\Interfaces\JsonResponseInterface as JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package Notifier\Http\Controllers
 */
class Controller extends BaseController
{
    /** @var JsonResponse */
    protected $response;

    /**
     * Controller constructor.
     * @param JsonResponse $response
     */
    public function __construct(JsonResponse $response)
    {
        $this->response = $response;
    }

    /**
     * @return JsonResponse
     */
    public function getInfo(): JsonResponse
    {
        return $this->response
            ->add('app', config('app.name'))
            ->add('version', config('app.version'))
            ->add('framework', app()->version());
    }
}
