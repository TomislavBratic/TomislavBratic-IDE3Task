<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Recipe;
use App\Models\Rating;
use App\Models\Grocery;
use App\Models\User;
use App\Models\RecipeGrocery;

class RecipeController extends Controller
{
    public function GetAll(Request $request){
        $data=$request->all();
        $recipes= Recipe::select('recipes.*','users.id as user_id','users.firstname','users.lastname')->leftJoin('users','recipes.user_id','=','users.id');
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
                $recipes=$recipes->where('users.firstname','like', '%'.$data['filters']['firstname'].'%');
            }
        }

        if(isset($data['filters']['lastname'])){
            if($data['filters']['lastname']!=''){
                $recipes=$recipes->where('users.lastname','like','%'. $data['filters']['lastname'].'%');
            }
        }

        if(isset($data['filters']['grocery_name'])){
            if($data['filters']['grocery_name']!=''){
                $recipeswithgroceries = RecipeGrocery::select('recipe_groceries.recipe_id')->leftJoin('groceries','recipe_groceris.grocery_id','=','groceries.id')->where('groceries.name',$data['filters']['grocery_name'])->get()->toArray();
                $recipes = $recipes->whereIn('id',$recipeswithgroceries);
            }
        }

        if(isset($data['filters']['portion_min'])){
            if($data['filters']['portion_min']!=''){
                $recipes=$recipes->where('portion', '>=',$data['filters']['portion_min']);
            }
        }

        
        if(isset($data['filters']['portion_max'])){
            if($data['filters']['portion_max']!=''){
                $recipes=$recipes->where('portion', '>=',$data['filters']['portion_max']);
            }
        }

        if(isset($data['filters']['timetocook_min'])){
            if($data['filters']['timetocook_min']!=''){
                $recipes=$recipes->where('timetocook', '>=',$data['filters']['timetocook_min']);
            }
        }

        if(isset($data['filters']['timetocook_max'])){
            if($data['filters']['timetocook_max']!=''){
                $recipes=$recipes->where('timetocook', '<=',$data['filters']['timetocook_max']);
            }
        }

        if(isset($data['filters']['rating_min'])){
            if($data['filters']['rating_min']!=''){
                $recipes=$recipes->where('rating', '>=',$data['filters']['rating_min']);
            }
        }
        
        if(isset($data['filters']['rating_max'])){
            if($data['filters']['rating_max']!=''){
                $recipes=$recipes->where('rating', '<=',$data['filters']['rating_max']);
            }
        }

        //data sort value ce biti npr. rating, porcija a type je ascending i descending
        if(isset($data['sort']['value']) && isset($data['sort']['type']) ){
            if($data['sort']['value']!='' && $data['sort']['type']!=''){
                $recipes=$recipes->orderBy($data['sort']['value'],$data['sort']['type'] );
            }
        }

        $recipes=$recipes->get();


        return Response::json($recipes, 200);
    }

    public function getOne($recipe_id){
        $recipe= recipe::find($recipe_id);
        return Response::json($recipe, 200);
    }
    
    public function delete($recipe_id){
        $recipe= recipe::find($recipe_id);
        if($recipe){
           $recipe->delete();
           return Response::json('recipe deleted successfully!', 200);
        }
        return Response::json('recipe not found!', 404);
    }

    public function update(Request $request, $recipe_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'preparation' => 'required|string|max:255',
            'portion' => 'required|string|max:255',
            'cooking_time' => 'required|string|max:255',
        ]);

        $recipe = Recipe::find($recipe_id);

        if ($recipe) {
            $recipe->update($validated);
            return  Response::json('Recipe updated successfully!', 200);
        }
        return  Response::json('Recipe not found!', 404);
    }

    public function create(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'preparation' => 'required|string|max:255',
            'portion' => 'required|string|max:255',
            'cooking_time' => 'required|string|max:255',
        ]);
        Recipe::create($validated);
        return Response::json(200);
          
    }
}
