<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;


$router->get('/{lastItem}', 'OfferController@find' );