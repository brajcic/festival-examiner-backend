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
use App\Festivals;



class AddFestivalController extends Controller
{
	public function add(Request $request){
		
		$festivalName = $request->festivalName;
		$location = $request->location;
		$bandNames = $request->bandNames;
				
		//echo $location;
				
		//$newFestival = Festivals::all();
		
		//var_dump($newFestival);
		
		$newFestival = new Festivals;
		$newFestival->festivalName = $festivalName;
		$newFestival->location = $location;
		$newFestival->bandNames = $bandNames;
					
			
		//echo $newFestival->festivalName;	
		$newFestival->save();
		
		return "Uspesno!";
    }
}
