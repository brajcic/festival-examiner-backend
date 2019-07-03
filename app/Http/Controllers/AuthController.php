<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use App\Users;

class AuthController extends Controller
{
	
	public function login(Request $request){
		
		$request->all();
		$email = $request->email;
		$password = $request->password;
		
	
		$allUsers = Users::all();
	
		$ind = 0;
	
		foreach($allUsers as $user){
				
				if(Hash::check($password,$user['password']))
					$ind = 1;
				
			}
	
		if ($ind != 0)
			return "Moze se logovati";
		else return "Ne moze se logovati";
	
		//$user = DB::table('users')->where('email', $email)->first();
		
		//$users = DB::table('users')->get();
	 
		
		//$this->assertDatabaseHas('users',['email' => $email]);
		
		
		}
	
	
	
	
    //
}
