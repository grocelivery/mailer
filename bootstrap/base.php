<?php

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Grocelivery\Mailer\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Grocelivery\Mailer\Console\Kernel::class
);

$app->routeMiddleware([
    'auth' => Grocelivery\Utils\Middleware\Authenticate::class,
]);

$app->router->group([
    'namespace' => 'Grocelivery\Mailer\Http\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/api.php';
});

$app->register(Illuminate\Mail\MailServiceProvider::class);
$app->register(Grocelivery\Mailer\Providers\AppServiceProvider::class);
$app->register(Grocelivery\Utils\Providers\UtilsServiceProvider::class);
$app->register(Illuminate\Redis\RedisServiceProvider::class);

$app->make('queue');

$app->configure('app');
$app->configure('mail');
$app->configure('database');
$app->configure('grocelivery');

$app->alias('mailer', Illuminate\Mail\Mailer::class);
$app->alias('mailer', Illuminate\Contracts\Mail\Mailer::class);
$app->alias('mailer', Illuminate\Contracts\Mail\MailQueue::class);

return $app;