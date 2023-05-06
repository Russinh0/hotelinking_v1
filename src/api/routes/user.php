<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;


$router->get('/', 'UserController@getAll' );
$router->post('/',"UserController@register");