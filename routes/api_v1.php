<?php

/**
 * @var \Laravel\Lumen\Routing\Router $router
 * 
 */

$router->post('login', 'AuthController@login');
$router->get('/refresh', 'AuthController@refresh');
$router->delete('/refresh', 'AuthController@logout');
$router->delete('/refresh/all', 'AuthController@logoutAll');
$router->post('/newActivity', 'ActivityController@new');
$router->post('/workout', 'WorkoutController@new');
$router->get('/workout', 'WorkoutController@getAll');
$router->get('/newActivity', 'ActivityController@getAll');
$router->delete('/newActivity/{id}', 'ActivityController@deleteActivity');

$router->group(['middleware' => 'auth.jwt'], function() use ($router){
    $router->get('/protected', 'ExampleController@protected');

});
 $router->get('/open', 'ExampleController@open');