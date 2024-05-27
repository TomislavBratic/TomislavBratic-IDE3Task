<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function CreateComment(Request $request){
        $data=$request->all();
        Comment::create($data);
        return Response::json(200);
          
    }
}
