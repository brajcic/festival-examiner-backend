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
use App\Http\Requests\FilterRequest;
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
    
    public function deleteFestival(Request $request){
        
       Festivals::where('id', $request->id)->delete();
       return Response::json(Festivals::all());
    }
    
     public function filters(FilterRequest $request){
       
        if($request->latitude != null && $request->longitude != null){
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
   
            if($request->regex != null){
                $regex = $request->regex;
                $festivals = Festivals::where('festival_name','LIKE',"%$regex%")->get();
                
            if($request->category_id != null){          
                $id = $request->category_id;
                $fk = $festivals->where('category_id' , $id);         
                    return Response::json($fk->values()->all());
                }
                    else return Response::json($festivals->values()->all());
            }            
            else{
                if($request->category_id != null){
                    $id = $request->category_id;
                    $fk = $festivals->where('category_id' , $id);
                        return Response::json($fk->values()->all());
                     }       
                }
            return Response::json($festivals);
        }else{
            if($request->regex != null){
                $regex = $request->regex;
                $festivals = Festivals::where('festival_name','LIKE',"%$regex%")->get();
               
        
            if($request->category_id != null){
                $id = $request->category_id;
                $fk = $festivals->where('category_id' , $id);
                return Response::json($fk->values()->all());
            }    
                return Response::json($festivals->values()->all());
   
           }else{
                if($request->category_id != null){
                    $id = $request->category_id;
                    $festivals = Festivals::where('category_id' , $id)->get();       
                        return Response::json($festivals->values()->all());         
                    }
                        else return Response::json(Festivals::all());
            }         
        }
}
    
    public function show(Request $request){
       return Response::json(Festivals::all());
    }
    
    public function showFestivalByID(Request $request){
       return Response::json(Festivals::where('id' , $request->id)->get());
    }
 
    public function update(UpdateFestivalRequest $request){ 
       $festival = Festivals::find($request->id); 
       $festival->festival_name= $request->festival_name;
       $festival->location = $request->location;
       $festival->band_names = $request->band_names;
       $festival->latitude = $request->latitude;
       $festival->longitude = $request->longitude;
       $url = $festival->image_url;
       
       if(File::exists($url))
           File::delete($url);
       
       $image = $request->file('image_url');
       $id = $festival->id;
       $name = 'image'.$id.'.'.$image->getClientOriginalExtension();
       $destinationPath = public_path('/images');
       $image->move($destinationPath, $name);
       $festival->image_url = 'images/'.$name;  
       $festival->save();
       return Response::json(Festivals::all());
    
    }
}
