<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () {
    return Str::random(32);
});

$router->group(['prefix' => 'classes'], function () use ($router) {
    $router->post('/', ['uses' => 'KelasController@createKelas']);
    $router->get('/{id}', ['uses' => 'KelasController@getKelasById']);
    $router->put('/{id}', ['uses' => 'KelasController@updateKelas']);
    $router->delete('/{id}', ['uses' => 'KelasController@deleteKelas']);
});
    
$router->group(['prefix' => 'students'], function () use ($router) {
    $router->post('/', ['uses' => 'StudentController@createStudent']);
    $router->put('/{id}', ['uses' => 'StudentController@updateStudent']);
    $router->delete('/{id}', ['uses' => 'StudentController@deleteStudent']);
});
