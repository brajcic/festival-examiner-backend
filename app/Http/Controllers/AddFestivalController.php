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
use App\Festivals;
use Location;
use Response;


class AddFestivalController extends Controller
{
	public function add(Request $request){
	
                
               
            
		$newFestival = new Festivals;
		$newFestival->festival_name = $request->festival_name;
		$newFestival->location = $request->location;
                $newFestival->latitude = $request->latidude;
                $newFestival->longitude = $request->longitude;
                
                    if($request->exists('band_names'))
                        $newFestival->band_names = $bandNames;
	
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
        
        
        
       // $userLocation = Location::get('82.117.212.250');
          
        //var_dump($userLocation);
        
        $userLatitude = $request->latitude;
        
        $userLongitude = $request->longitude;

        
       //$userLongitude = 20.913999999999987;
       //$userLatitude = 44.0082; // kg
         
        //var_dump($userLatitude);
        //var_dump($userLongitude);
       
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

            //echo $distance."  ";
            
           if($distance <= $maxDistance)
               array_push($returningFestivals, $festival);
          
           
        }
    
         return Response::json($returningFestivals); 
       
        
    }
    
    
    public function show(Request $request){
        
       
       return Response::json(Festivals::simplePaginate(2)); // 2 zato sto ima samo 6 festivala u bazi
    }
    
    public function update(Request $request){
        
        $id = $request->id;
        
        /*if($request->exists('festivalName')){
            if($request->filled('festivalName')){
                $newName = $request->festivalName;
            }
        }
         * */
         
        
        
        
        
    }
}
