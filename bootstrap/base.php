<?php

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Notifier\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Notifier\Console\Kernel::class
);

$app->router->group([
    'namespace' => 'Notifier\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

$app->configure('app');

return $app;
