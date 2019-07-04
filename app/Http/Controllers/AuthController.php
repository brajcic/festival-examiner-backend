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
use App\Users;




class AuthController extends Controller
{
	public function __construct()
		{
			$this->middleware('auth:api', ['except' => ['login']]);
		}
	

	public function login(Request $request){
		
		//$request->all();
		$email = $request->email;
		$password = $request->password;
		
		$ip = $request->ip();
		
		//echo $ip;
	
		$allUsers = Users::all();
	
	//	var_dump($allUsers);
	
		$ind = 0;
	
		foreach($allUsers as $user){
				
				if(Hash::check($password,$user['password'])){
					$ind = 1;
				}
		}
	
		if ($ind != 0){
			
			$token = str_random(32);
				
			return response()->json(['token' => $token], 200);		
		}
		
		    return response('Unauthenticated.', 401);

		
		
		//else  abort(401, 'Cannot login with that credentials.');
		//return redirect()->route('login');

	}
	
	public function addFestival(Request $request){

			/*
			  ako prodje validaciju
			 
			 */
			 
		/*	$festivalName = $request->festivalName;
			$location = $request->location;
			$bandNames = $request->bandNames;
			
			echo $location;
			
			$newFestival = new Festivals;
				$newFestival->festivalName = $festivalName;
				$newFestival->location = $location;
				$newFestival->bandNames = $bandNames;
				
			
			$newFestival->save();
		
		
		return;
		* */
		
		return "hello";
	}

}

