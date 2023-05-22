<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;
//use Tymon\JWTAuth\Http\Parser\Cookies;

use function App\Utils\customMsg;

class UserController extends Controller
{
    protected $userInterface;
    public function __construct(UserRepository $userInterface)
    {
        $this->userInterface =$userInterface;
        $this->middleware('auth-api',['except'=>['login','register']]);
    }
    
    protected function respondWithToken($token)
    {
       return response()-> json([
            'token_type'=>'bearer' ,
            'access_token' => $token,
            'expires_in' => config('jwt.ttl')
        ]);
    }


    public function register(Request $req)
    {

        $this->validate($req,
        [
            'email'=>'required |email| unique:users| max:255',

            'password'=>['required','string','min:8','regex:/[A-Z]/','regex:/[a-z]/','regex:/[0-9]/'],

            'name'=>'required | unique:users,name| max: 24'
        ]);
        $res=$this->userInterface->register($req->json()->all());
        if($res['error'])return response($res,401);
        return response($res,204);
    }
    public function getAll()
    {
        $users=$this->userInterface->getAll();
        return response()->json($users);
    }
    public function login(Request $req){
        $userData=$req->only(['email','password']);
        $res=$this->userInterface->login($userData);
        if($res['error'])return response($res,401);
        return $this->respondWithToken($res['data']);
    }

    public function logout (){
        auth()->logout();
        return response()->json(customMsg(false,'Logout successful'));
    }

    public function me(){
        return response()->json(auth()->user()->makeHidden(['password','created_at','updated_at']));
    }
    //
}