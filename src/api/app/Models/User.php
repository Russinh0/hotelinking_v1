<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Lumen\Auth\Authorizable;
//use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject,AuthenticatableContract
{
    use   Authenticatable,HasFactory;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function offers(){
        return $this->belongsToMany(Offer::class,'promotional_code','user_id','offer_id');
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $table = 'users';
    protected $fillable = ['name','email','password'];

};