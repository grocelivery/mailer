<?php

namespace Grocelivery\Notifier\Providers;

use Grocelivery\Utils\Interfaces\JsonResponseInterface;
use Grocelivery\Utils\Responses\JsonResponse;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobFailed;

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
