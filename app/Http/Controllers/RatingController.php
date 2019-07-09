<?php

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

class RatingController extends Controller
{
    public function show(Request $request){
        return Response::json(Ratings::all());
    }
    
    public function delete(Request $request){
        Ratings::where('id', $request->id)->delete();
        return Response::json(Ratings::all());
    }
}
