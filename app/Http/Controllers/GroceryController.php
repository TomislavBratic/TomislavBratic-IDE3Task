<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Grocery;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GroceryController extends Controller
{
    public function GetAll(Request $request){
        $data=$request->all();
        $groceries= Grocery::select('*');

        if(isset($data['filters']['name'])){
            if($data['filters']['name']!=''){
                $groceries=$groceries->where('name', 'like', '%'.$data['filters']['name'].'%');
            }
        }

        if(isset($data['sort']['value']) && isset($data['sort']['type']) ){
            if($data['sort']['value']!='' && $data['sort']['type']!=''){
                $groceries=$groceries->orderBy($data['sort']['value'],$data['sort']['type'] );
            }
        }

        $groceries=$groceries->get();


        return Response::json($groceries, 200);
    }

    public function GetOne($grocery_id){
        $grocery= Grocery::find($grocery_id);
        return Response::json($grocery, 200);
    }
    
    public function DeleteOne($grocery_id){
        $grocery= Grocery::find($grocery_id);
        if($grocery){
           $grocery->delete();
           return Response::json('grocery deleted successfully!', 200);
        }
        return Response::json('grocery not found!', 404);
    }

    public function editOne($grocery_id)
    {
        $grocery = Grocery::find($grocery_id);

        if (!$grocery) {
            return  Response::json('grocery not found!', 404);
        }

        return view('groceries.edit', compact('grocery'));
    }


    public function updateOne(Request $request, $grocery_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:groceries,email,' . $grocery_id,
            'identification_number' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'home_number' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $grocery = Grocery::find($grocery_id);

        if (!$grocery) {
            return  Response::json('grocery not found!', 404);
        }

        $grocery->update($validated);
        return  Response::json('grocery updated successfully!', 200);
    }
}
