<?php

namespace App\Implementations;

use App\Models\User;

use App\Repositories\UserRepository;

class UserRepositoryImpl implements UserRepository 
{
    public function create($payload){
        return User::create($payload);
    }

    public function getAll(){
        return User::all();
    }
};