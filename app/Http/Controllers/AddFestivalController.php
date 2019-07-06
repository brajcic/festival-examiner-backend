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
use App\Http\Requests\FestivalRequest;
use App\Http\Requests\UpdateFestivalRequest;
use App\Festivals;
use Response;


class AddFestivalController extends Controller
{
	public function add(FestivalRequest $request){
	    
	$newFestival = new Festivals;
	$newFestival->festival_name = $request->festival_name;
	$newFestival->location = $request->location;
        $newFestival->latitude = $request->latidude;
        $newFestival->longitude = $request->longitude;
        $newFestival->band_names = $request->band_names;
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

	$newFestival->save();
		
              
	return Response::json(Festivals::all());
                
                 
    }
    
    public function search(Request $request){
		
	$regex = $request->regex;
			
	$festivals = Festivals::where('festival_name', 'LIKE' , "%$regex%")->get();
			
	return Response::json($festivals);
		
	}
        
    public function deleteFestival(Request $request){
        
        $id = $request->id;
        
        Festivals::where('id', $id)->delete();
        
        return Response::json(Festivals::all());
    }
    
    public function distance(Request $request){
        
        $ip = $request->ip();
        
        $maxDistance = $request->distance;

        $userLatitude = $request->latitude;
        
        $userLongitude = $request->longitude;

       
        $festivali = Festivals::all();
        $returningFestivals = [];
        
      
        foreach($festivali as $festival){
        
            $longitudeTo = $festival['longitude'];
            $latitudeTo = $festival['latitude'];
       
            
            $theta = $userLongitude - $longitudeTo;
            $dist = sin(deg2rad($userLatitude)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($userLatitude)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;

            $distance = ($miles * 1.609344);
            
           if($distance <= $maxDistance)
               array_push($returningFestivals, $festival);
          
           
        }
    
         return Response::json($returningFestivals); 
       
        
    }
    
    
    public function show(Request $request){
        
       
       return Response::json(Festivals::simplePaginate($request->npp));
    }
    
    public function update(UpdateFestivalRequest $request){
        
        $updatedFestival = new Festivals;
     
        $updatedFestival->festival_name = $request->festival_name;
	$updatedFestival->location = $request->location;
        $updatedFestival->latitude = $request->latidude;
        $updatedFestival->longitude = $request->longitude;
        $updatedFestival->band_names = $request->band_names;
        
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

	$updatedFestival->save();
		
              
	return Response::json(Festivals::all());
       
        
        
    }
}
