<?php

namespace App\Repositories;


interface UserRepository
{
    public function register($payload);
    public function login($payload);
    public function getAll();
}