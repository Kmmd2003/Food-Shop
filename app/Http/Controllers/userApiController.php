<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserApiController extends Controller
{
    public function register(Request $request){
        $data = Validator::make($request->all() , [
            'name' => 'required',
            'email' => 'required',
            'password' => 'string'
        ] , ['required' => 'name is required']);
        if($data->errors()->any()){
            return $data->errors();
        }

        // $user = User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password'])
        // ]);
        $user = User::create($request->all());
        $token = $user->createToken('food_shop')->plainTextToken;
        return $token;
    }

    public function login(Request $request){
        $data = Validator::make($request->all() , [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if($data->errors()->any()){
            return $data->errors();
        }

        $user = User::where('email' , '=' , $data['email'])->first();

        if(!$user || !Hash::check($data['password'] , $user->password)){
            return response(['status' => 'user not found!'] , 401);
        }

        $token = $user->createToken('*')->plainTextToken;

        return response(['token' => $token] , 200);

    }

    public function logout(){
        // Auth::user()->tokens()->delete();
        return redirect('login');
    }
}
