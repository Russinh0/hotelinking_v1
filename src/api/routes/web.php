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
use Illuminate\Support\Facades\Route;

$router->get('/', function () use ($router) {
    return "HOLAA";
});

$router->group(['prefix' => 'public/user'], function () use ($router) {
    require __DIR__.'/user_public.php';
});

$router->group(['prefix' => 'user','middleware'=>'auth'], function () use ($router) {
    require __DIR__.'/user.php';
});
