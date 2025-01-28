<?php

namespace App\Http\Controllers;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class carApiController extends Controller

{
    public function index(){
        return Cars::all();
    }


    public function insert(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required',
            'model' => 'required'
        ]);
        if($validator->errors()){
            return $validator->errors();
        }
        return Cars::create($request->all());
        // return Cars::create(
        //     [
        //         'name' => 'bittel' , 
        //         'model' => '2016' ,
        //     ]
        // );
    }
}