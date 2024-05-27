<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Recipe;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
     public function CreateRating(Request $request){
        $data=$request->all();
        $recipe= Recipe::where('id', $data['recipe_id'])->first();
        if($recipe->user_id!=Auth::user()->id){
            $existing_rating=Rating::where('user_id',$data['user_id'])->where('recipe_id',$data['recipe_id'])->first();
            if(!$existing_rating)
            {
                Rating::create($data);
                return Response::json(200);
            }
            return Response::json("Rating already exists!",400);
        }
        return Response::json("Owner can't rate own recipe!",400);
    }
}
