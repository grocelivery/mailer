<?php

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Grocelivery\Notifier\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Grocelivery\Notifier\Console\Kernel::class
);

$app->routeMiddleware([
    'auth' => Grocelivery\HttpUtils\Middleware\Authenticate::class,
]);

$app->router->group([
    'namespace' => 'Grocelivery\Notifier\Http\Controllers',
], function ($router) {
    require __DIR__ . '/../routes/api.php';
});

$app->register(Illuminate\Mail\MailServiceProvider::class);
$app->register(Grocelivery\Notifier\Providers\AppServiceProvider::class);
$app->register(Grocelivery\Notifier\Providers\MailableServiceProvider::class);
$app->register(Grocelivery\HttpUtils\Providers\HttpUtilsServiceProvider::class);

$app->configure('app');
$app->configure('http-utils');
$app->configure('mail');

$app->alias('mailer', Illuminate\Mail\Mailer::class);
$app->alias('mailer', Illuminate\Contracts\Mail\Mailer::class);
$app->alias('mailer', Illuminate\Contracts\Mail\MailQueue::class);


return $app;