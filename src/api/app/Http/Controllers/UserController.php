<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository; 
use Illuminate\Http\Request;
class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserRepository $userInterface)
    {
        $this->userInterface =$userInterface;
    }

    public function register(Request $payload)
    {
        $data=$payload->json()->all();
        $this->userInterface->create($data);
        return response("nice",204);
    }
    public function getAll()
    {
        $users=$this->userInterface->getAll();
        return response()->json($users);
    }
    //
}