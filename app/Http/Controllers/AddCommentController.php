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
use App\Http\Requests\AddCommentRequest;
use App\Comments;
use Response;

class AddCommentController extends Controller
{
    public function addComment(AddCommentRequest $request){
        
        $newComment = new Comments;
     
        $newComment->comment = $request->comment;
        $id = Comments::max('id') + 1;
        $newComment->name = $request->name.$id;
        $newComment->festival_id = $request->id;
        $newComment->save();
        return Response::json(Comments::where('festival_id' , $request->id)->get());
    }
   
}
