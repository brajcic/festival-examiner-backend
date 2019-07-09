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
    public function show(Request $request){
        return Response::json(Comments::all());
    }
    
    public function delete(Request $request){
        Comments::where('id', $request->id)->delete();
        return Response::json(Comments::all());
    }
    
}
