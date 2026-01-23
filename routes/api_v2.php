<?php

/**
 * @var \Laravel\Lumen\Routing\Router $router
 * 
 */

$router->get('/newActivity/{newActivity}', 'ActivityController@new');
/*
$router->post('login', 'AuthController@login');
$router->delete('/refresh', 'AuthController@logout');
$router->delete('/refresh/all', 'AuthController@logoutAll');
*/

$router->get('/open', 'ExampleController@open');
