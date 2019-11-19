<?php

namespace Notifier\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package Notifier\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [];
}
