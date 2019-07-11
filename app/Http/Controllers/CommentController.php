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
use App\Comments;
use App\Ratings;


class CommentController extends Controller
{
    
    public function delete(Request $request){
        
        $festival = Comments::where('id', $request->id)->get();
        $idf = $festival->pluck('festival_id');
        Comments::where('id', $request->id)->delete(); 
        return Response::json(Comments::where('festival_id', $idf)->get());
    }
    
    public function showid(Request $request){
       
        //var_dump($request->id);
        
       $komentari = Comments::where('festival_id', $request->id)->get();
       
       
        return Response::json($komentari);
        
    }
    
}
