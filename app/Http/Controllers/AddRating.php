<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Guard;
use App\Http\Requests\AddRatingRequest;
use App\Ratings;
use Response;

class AddRating extends Controller
{
    public function addRating(AddRatingRequest $request){

	$ip = $request->ip();		
	$rating = Ratings::where('name', $ip)->get()->toArray();
            
	if(count($rating) == 0){
            $newRating = new Ratings;		
            $newRating->name = $request->name;
            $newRating->festival_id = $request->festival_id;
            $newRating->rating = $request->rating;
            $newRating->save();
            return Response::json(Ratings::all());
	}	
	else{
            return Response::json(array('error' => 'You have already rated a festival'));
	}
    }
}
