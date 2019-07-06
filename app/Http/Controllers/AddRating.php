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
use App\Ratings;

class AddRating extends Controller
{
    public function addRating(Request $request){
		
			$tableIP = Ratings::all(['name'])->toArray();

			//var_dump($tableIP);
		
			$ip = $request->ip();
			
			$ind = 0;
			
			foreach($tableIP as $adresa){
				
					if($ip == $adresa['name'])
						$ind = 1;
			}
			
			if($ind == 0){
				
				$newRating = new Ratings;
				
				$newRating->name = $request->name;
				$newRating->festivalID = $request->festivalID;
				$newRating->rating = $request->rating;
				
				$newRating->save();
                                
                               return Response::json(Ratings::all());
			}
			
			else{
					return Response::json(array('error' => 'You have already rated a festival'));
			}
		
		
		}
}
