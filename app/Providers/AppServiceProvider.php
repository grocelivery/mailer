<?php

namespace Grocelivery\Notifier\Providers;

use Grocelivery\HttpUtils\Interfaces\JsonResponseInterface;
use Grocelivery\HttpUtils\Responses\JsonResponse;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package Grocelivery\Notifier\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->bind(JsonResponseInterface::class, JsonResponse::class);
    }
}
