<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Recipe;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\Grocery;
use App\Models\User;

class RecipeController extends Controller
{
    public function GetAll(Request $request){
        $data=$request->all();
        $recipes= Recipe::select('*');
        $users=User::select('*');
        $ratings=Rating::select('*');
        $groceries=Grocery::select('*');

        if(isset($data['filters']['name'])){
            if($data['filters']['name']!=''){
                $recipes=$recipes->where('name', 'like', '%'.$data['filters']['name'].'%');
            }
        }

        if(isset($data['filters']['firstname'])){
            if($data['filters']['firstname']!=''){
                $recipes=$recipes->where('user_id','like', $users->select('user_id')->where('firstname','like', '%'.$data['firstname'].'%'));
            }
        }

        if(isset($data['filters']['lastname'])){
            if($data['filters']['lastname']!=''){
                $recipes=$recipes->where('user_id','like', $users->select('user_id')->where('lastname','like', '%'.$data['lastname'].'%'));
            }
        }

        if(isset($data['filters']['grocery_name'])){
            if($data['filters']['grocery_name']!=''){
               // $recipes=$recipes->where('user_id','like', $groceries->select('user_id')->where('name','like', '%'.$data['grocery_name'].'%'));
            }
        }

        if(isset($data['filters']['portion'])){
            if($data['filters']['portion']!=''){
                $recipes=$recipes->whereBetween('portion', ['minportion', 'maxportion']);
            }
        }

        if(isset($data['filters']['timetocook'])){
            if($data['filters']['timetocook']!=''){
                $recipes=$recipes->whereBetween('timetocook', ['mintime', 'maxtime']);
            }
        }

        if(isset($data['filters']['rating'])){
            if($data['filters']['rating']!=''){
                $recipes=$recipes->where('recipe_id','like', $ratings->select('recipe_id')->whereBetween('rating',[$data['minrating'], $data['maxrating']]));
            }
        }

        if(isset($data['sort']['value']) && isset($data['sort']['type']) ){
            if($data['sort']['value']!='' && $data['sort']['type']!=''){
                $recipes=$recipes->orderBy($data['sort']['value'],$data['sort']['type'] );
            }
        }

        $recipes=$recipes->get();


        return Response::json($recipes, 200);
    }

    public function GetOne($recipe_id){
        $recipe= recipe::find($recipe_id);
        return Response::json($recipe, 200);
    }
    
    public function DeleteOne($recipe_id){
        $recipe= recipe::find($recipe_id);
        if($recipe){
           $recipe->delete();
           return Response::json('recipe deleted successfully!', 200);
        }
        return Response::json('recipe not found!', 404);
    }

    public function editOne($recipe_id)
    {
        $recipe = Recipe::find($recipe_id);

        if (!$recipe) {
            return  Response::json('Recipe not found!', 404);
        }

        return view('recipe.edit', compact('recipe'));
    }


    public function updateOne(Request $request, $recipe_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'preparation' => 'required|string|max:255',
            'portion' => 'required|string|max:255',
            'cooking_time' => 'required|string|max:255',
        ]);

        $recipe = Recipe::find($recipe_id);

        if (!$recipe) {
            return  Response::json('Recipe not found!', 404);
        }

        $recipe->update($validated);
        return  Response::json('Recipe updated successfully!', 200);
    }

    public function CreateRecipe(Request $request){
        $data=$request->all();
        Recipe::create($data);
        return Response::json(200);
          
    }
}
