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
use App\Category;
use Response;
use App\Festivals;
use App\Comments;
use App\Ratings;


class CategoryController extends Controller
{
    public function add(Request $request){
   
        $newCategory = new Category;
        $newCategory->category_name = $request->category_name;
        
        $newCategory->save();
        
        return Response::json(Category::all());
        
       
    }
    
    public function delete(Request $request){
        
        $id = $request->id;
        
        Category::where('id', $id)->delete();
      
        return Response::json(Category::all());
    }
    
    public function show(Request $request){
        
        return Response::json(Category::all());
    }
    
    public function update(Request $request){
        
        $id = $request->id;
        
        $oldCategory = Category::where('id', $id)->get();
        
        //var_dump($oldCategory);
        
        //echo $oldCategory[0]['categoryName'];
        
        if($request->exists('categoryName')){
            if($request->filled('categoryName')){
               //echo $oldCategory['categoryName'];
               $oldCategory[0]['categoryName'] = $request->categoryName;
               $oldCategory[0]->save();
            }
            else return Response::json(array('error' => 'categoryName is empty.'));
        }
        else return Response::json(array('error' => 'categoryName has not been sent.'));
       
    }
    
}
