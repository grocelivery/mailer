<?php

namespace Notifier\Http\Controllers;

use Laravel\Lumen\Application;
use Laravel\Lumen\Routing\Controller as BaseController;
use Notifier\Exceptions\InternalServerException;
use Notifier\Http\Responses\Response;
use Notifier\Interfaces\Http\Responses\ResponseInterface;

/**
 * Class Controller
 * @package Notifier\Http\Controllers
 */
class Controller extends BaseController
{
    /** @var Application */
    protected $app;
    /** @var Response */
    protected $response;

    /**
     * Controller constructor.
     * @param Application $app
     * @param Response $response
     */
    public function __construct(Application $app, Response $response)
    {
        $this->app = $app;
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function getInfo(): ResponseInterface
    {
        return $this->response
            ->add('app', config('app.name'))
            ->add('version', config('app.version'))
            ->add('framework', $this->app->version());
    }
}
