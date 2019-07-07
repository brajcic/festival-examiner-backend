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
        $newComment->name = $request->name;
        $newComment->comment = $request->comment;
        $newComment->festival_id = $request->festival_id;
        return Response::json(Comments::all());
    }
   
}
