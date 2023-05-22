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

$router->group(['prefix' => 'offers'], function () use ($router) {
    require __DIR__.'/offers.php';
});
$router->get('/', function () use ($router) {
    return "HOLAA";
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    require __DIR__.'/auth.php';
});

$router->group(['prefix' => 'promotional-code'], function () use ($router) {
    require __DIR__.'/promotionalCode.php';
});