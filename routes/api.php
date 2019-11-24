<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */
$router->get('/', 'Controller@getInfo');

$router->group(['middleware' => 'auth'], function () use ($router): void {
    $router->post('/mail/{mailable}', 'MailController@sendMail');
});

