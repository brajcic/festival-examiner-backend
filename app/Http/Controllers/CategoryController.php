<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Category;
use Response;
use App\Festivals;
use App\Comments;
use App\Ratings;


class CategoryController extends Controller
{
    public function add(CategoryRequest $request){
       $newCategory = new Category;
       $newCategory->category_name = $request->category_name;
       $newCategory->save();
       return Response::json(Category::all());
    }
    
    public function delete(DeleteCategoryRequest $request){
        Category::where('id', $request->id)->delete();
        return Response::json(Category::all());
    }
    
    public function show(Request $request){ 
        return Response::json(Category::all());
    }
    
    public function update(UpdateCategoryRequest $request){  
        
        $oldCategory = Category::find($request->id);
        $oldCategory->category_name = $request->category_name;
        $oldCategory->save();
        return Response::json(Category::all());
    } 
}
