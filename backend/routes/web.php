<?php

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

$router->post('/auth/login', 'AuthController@postLogin');
$router->get('/user', 'UserController@getUserData');

$router->group(['prefix' => 'stores'], function () use ($router) {
    $router->group(['prefix' => 'switches'], function () use ($router) {
        $router->get('all', ['uses' => 'SwitchController@all']);
        $router->get('read/{id}', ['uses' => 'SwitchController@read', 'as' => 'stores/switches/read']);
        $router->post('create', ['uses' => 'SwitchController@create']);
        $router->put('update', ['uses' => 'SwitchController@update']);
        $router->delete('delete', ['uses' => 'SwitchController@delete']);
    });

    $router->get('authors', ['uses' => 'AuthorController@showAllAuthors']);
    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('authors', ['uses' => 'AuthorController@create']);
    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});