<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userApiController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $token = $user->createToken('mmd_food')->toArray()['plainTextToken'];
        return $token;
    }
}
