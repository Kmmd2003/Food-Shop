<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminRestaurantApiController extends Controller
{
    public function index()
    {
        return Restaurant::paginate(10);
    }

    public function create(Request $request)
    {
        $data = Validator::make($request->all() , [
            'name' => 'required|unique:restaurants,title|string|min:3|max:32' , 
            'image' => 'required|mimes:png,jpg|max:2000' , 
            'address' => 'required|max:600'
        ]);
        if($data->errors()->any()){
            return $data->errors();
        }
        $name = $request->input('name');
        $address = $request->input('address');
        $description = $request->input('description');
        $image = time() .'-'.  $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('img') , $image);
        $is_slide = $request->input('is_slide');
        Restaurant::create([
            'title' => $name , 
            'address' => $address ,
            'image' => $image ,
            'is_slide' => $is_slide ?? 0 , 
            'description' => $description
        ]);
    }

    public function show($id)
    {
        return Restaurant::findOrFail($id);
    }

    public function update(Request $request , $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if($restaurant->title != $request->input('name')){
        $data = Validator::make($request->all() , [
            'name' => 'required|unique:restaurants,title|string|min:3|max:32'
        ]);
        if($data->errors()->any()){
            return $data->errors();
        }
        return $restaurant->update($request->all());
    }


    }

    public function delete($id)
    {
        return Restaurant::findOrFail($id)->delete();
    }
}
