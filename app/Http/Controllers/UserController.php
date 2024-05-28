<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

class UserController extends Controller
{
    
    public function GetAll(Request $request){
        $data=$request->all();
        $users= User::select('*');

        if(isset($data['filters']['firstname'])){
            if($data['filters']['firstname']!=''){
                $users=$users->where('firstname', 'like', '%'.$data['filters']['firstname'].'%');
            }
        }

        if(isset($data['filters']['lastname'])){
            if($data['filters']['lastname']!=''){
                $users=$users->where('lastname','like', '%'.$data['filters']['lastname'].'%');
            }
        }

        if(isset($data['sort']['value']) && isset($data['sort']['type']) ){
            if($data['sort']['value']!='' && $data['sort']['type']!=''){
                $users=$users->orderBy($data['sort']['value'],$data['sort']['type'] );
            }
        }

        $users=$users->get();


        return Response::json($users, 200);
    }

    public function GetOne($user_id){
        $user= User::find($user_id);
        return Response::json($user, 200);
    }
    
    public function delete($user_id){
        $user= User::find($user_id);
        if($user){
           $user->delete();
           return Response::json('User deleted successfully!', 200);
        }
        return Response::json('User not found!', 404);
    }

    public function update(Request $request, $user_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user_id,
            'identification_number' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'home_number' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $user = User::find($user_id);

        if (!$user) {
            $user->update($validated);
            return  Response::json('User updated successfully!', 200);
        }
        return  Response::json('User not found!', 404);
    }

    public function create(Request $request){
        $data=$request->all();
        User::create($data);
        return Response::json(200);
          
    }
}
