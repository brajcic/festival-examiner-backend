<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
	
	public function login(Request $request){
		
		$request->all();
		$email = $request->email;
		$password = $request->password;
		
		if(Auth::attempt(['email' => $email, 'password' => $password])){
				
			}
			
		
		
		
		}
	
	
	
	
    //
}
