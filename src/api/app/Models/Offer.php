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

class Offer extends Model
{
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function users(){
        return $this->belongsToMany(User::class,'promotional_code','offer_id','user_id');
    }
    protected $table = 'offers';
    protected $fillable = ['name','image'];

};