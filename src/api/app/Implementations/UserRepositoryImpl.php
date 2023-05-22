<?php

namespace App\Implementations;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Services\UserServices;
require_once __DIR__.'/../Utils/customMsg.php';
use function App\Utils\customMsg;

class UserRepositoryImpl implements UserRepository 
{
    private $userServices;

    protected function findUser($email){
        return User::where('email','=',$email)->first();
    }
    
    
    public function __construct(UserServices $userServices)
    {
        $this->userServices= $userServices;
    }
    

    public function register($payload){
        try{
            $payload['password']=$this->userServices->makeHash($payload['password']);
            User::create($payload);
            $res= customMsg(false,'Success');
            return $res;
        }
        catch (\Exception $e){
            return $e;
        }
    }


    public function login($payload){
        try{
           // $data=$payload->json()->all();
            $token= Auth::attempt($payload);
             if(!$token)return customMsg(true,'Unauthorized',$token) ;
             $res= customMsg(false,'Success',$token);
             return $res;

        }catch (\Exception $e){
            print $e;
        }
    }
    public function getAll(){
        return User::all();
    }
};