<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Guard;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\LoginRequest;
use App\User;
use Response;
use JWTFactory;
use JWT;




class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login']]);
    }
	

    public function login(LoginRequest $request){
	$email = $request->email;
	$password = $request->password;
	$allUsers = User::all();
	$ind = 0;
	
	foreach($allUsers as $user){
                   
            if(strcmp($user['email'],$email) == 0 ){            
                if(Hash::check($password, $user['password'])){
                $ind = 1;
                $u = $user; 
                }          
            }
	}
	
	if ($ind != 0){	
            $token = JWTAuth::fromUser($u);		
            return Response::json(['token' => $token], 200);	
        }
		
        return Response::json(array('error' => 'User does not exist in database.'));
    }
}

