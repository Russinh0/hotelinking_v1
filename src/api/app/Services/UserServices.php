<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
class UserServices
{
    public function makeHash($password){
      return Hash::make($password);
    }
    public function checkPassword($plainPassword,$hashedPassword){
       return Hash::check($plainPassword,$hashedPassword);
    }
};