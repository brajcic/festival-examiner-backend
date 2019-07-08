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
use File;


class AddFestivalController extends Controller
{
        
	public function add(FestivalRequest $request){
	    
	$newFestival = new Festivals;
	$newFestival->festival_name = $request->festival_name;
	$newFestival->location = $request->location;
        $newFestival->latitude = $request->latitude;
        $newFestival->longitude = $request->longitude;
        $newFestival->band_names = $request->band_names;
        $newFestival->category_id = $request->category_id;
        
        $image = $request->file('image_url');
        $id = Festivals::max('id') + 1;
        $name = 'image'.$id.'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        
        $newFestival->image_url = 'images/'.$name;
	$newFestival->save();       
	return Response::json(Festivals::all());          
    }
    
    public function search(Request $request){
		
	$regex = $request->regex;		
	$festivals = Festivals::where('festival_name', 'LIKE' , "%$regex%")->get();	
	return Response::json($festivals);	
    }
        
    public function deleteFestival(Request $request){
        
       Festivals::where('id', $request->id)->delete();
       return Response::json(Festivals::all());
    }
    
    public function distance(Request $request){
        
       $festivals = Festivals::select(
            DB::raw("*,
                ( 6371 * acos( cos( radians(?) ) *
                cos( radians( latitude ) )
                * cos( radians( longitude ) - radians(?)
                ) + sin( radians(?) ) *
                sin( radians( latitude ) ) )
                ) AS distance"))
            ->having("distance", "<", "?")
            ->orderBy("distance")
            ->setBindings([$request->latitude, $request->longitude, $request->latitude, $request->distance])
            ->get();
       
       return Response::json($festivals);
    
    }
    
    
    public function show(Request $request){
       return Response::json(Festivals::simplePaginate($request->npp));
    }
    
    public function showFestivalByID(Request $request){
       return Response::json(Festivals::where('id' , $request->id)->get());
    }
 
    public function update(UpdateFestivalRequest $request){
        
       $festival = Festivals::where('id' , $request->id)->get();
       
       $festival[0]['festival_name'] = $request->festival_name;
       $festival[0]['location'] = $request->location;
       $festival[0]['band_names'] = $request->band_names;
       $festival[0]['latitude'] = $request->latitude;
       $festival[0]['longitude'] = $request->longitude;
       $url = $festival[0]['image_url'];
       
       if(File::exists($url))
           File::delete($url);
       
       $image = $request->file('image_url');
       $id = $festival[0]['id'];
       $name = 'image'.$id.'.'.$image->getClientOriginalExtension();
       $destinationPath = public_path('/images');
       $image->move($destinationPath, $name);
       $festival[0]['image_url']->image_url = 'images/'.$name;     
       return Response::json(Festivals::all());
    
    }
}
