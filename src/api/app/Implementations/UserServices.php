<?php

namespace App\Services;

use App\Models\User;

use App\Repositories\UserRepository;

class UserServices
{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this ->userRepository=$userRepository;
    }
    public function create($payload){
        return User::create($payload);
    }

    public function getAll(){
        return User::all();
    }
};