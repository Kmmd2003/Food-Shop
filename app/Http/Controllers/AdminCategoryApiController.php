<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCategoryApiController extends Controller
{
    public function index(){
        return Category::all();
    }

    public function show($id){
        return Category::findOrFail($id);
    }

    public function create(Request $request){
        $data = Validator::make($request->all() , [
            'name' => 'required',
            'description' => 'max:600'
        ] , ['required' => 'name is required']);
        if($data->errors()->any()){
            return $data->errors();
        }
        return Category::create($request->all());
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        return $category->update($request->all());
    }

    public function delete($id){
        return Category::findOrFail($id)->delete();
    }


}
