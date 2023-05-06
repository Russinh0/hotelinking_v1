<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Support\Facades\Hash;
class User extends Model
{
    use Authenticatable, Authorizable, HasFactory;

    
    protected $table = 'users';
    protected $fillable = ['name','email','password'];


    public function setPasswordAttribute($password)
    {
        
        $this->attributes['password'] = Hash::make($password);
    }
};