<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */
$router->get('/', 'Controller@getInfo');


    $router->post('/mail/{mailable}', 'MailController@sendMail');


