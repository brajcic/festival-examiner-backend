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
use Location;
use Response;


class AddFestivalController extends Controller
{
	public function add(Request $request){
		
		$festivalName = $request->festival_name;
		$location = $request->location;
                if($request->exists('band_names'))
                    $bandNames = $request->band_names;
				
		//echo $location;
				
		//$newFestival = Festivals::all();
		
		//var_dump($newFestival);
		
		$newFestival = new Festivals;
		$newFestival->festival_name = $festivalName;
		$newFestival->location = $location;
                
                    if($request->exists('band_names'))
                        $newFestival->band_names = $bandNames;
					
			
		//echo $newFestival->festivalName;	
		$newFestival->save();
		
		return Response::json(array('message' => 'Uspesno ste dodali festival'));
    }
    
    public function search(Request $request){
		
			$regex = $request->regex;
			
			//echo $regex;
			
			$festivals = Festivals::where('festival_name', 'LIKE' , "%$regex%")->get();
			
			foreach($festivals as $festival){
				
					echo $festival['festival_name'];
			}	
		
	}
        
    public function deleteFestival(Request $request){
        
        $id = $request->id;
        
        Festivals::where('id', $id)->delete();

        return "Uspesno";
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
        
        
       return Response::json(Festivals::all());
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
