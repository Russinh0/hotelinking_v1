<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;


$router->get('/', 'UserController@getAll' );
$router->post('/login',"UserController@login");
$router->post('/',"UserController@register");
$router->post('/me',"UserController@me");
$router->post('/refresh',"UserController@refresh");