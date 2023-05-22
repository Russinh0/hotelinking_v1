<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;

$router->get('/{userId}', 'PromoCodeController@find' );
$router->post('/', 'PromoCodeController@create' );