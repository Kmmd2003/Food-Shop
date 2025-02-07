<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductApiController extends Controller
{
    public function index(){
        return Product::paginate(10);
    }

    public function show($id){
        return Product::findOrFail($id);
    }

    public function create(Request $request){
        return Product::create($request->all());
    }

    public function update(Request $request , $id){
        $products = Product::findOrFail($id);
        return $products->update($request->all());
    }

    public function delete($id){
        return Product::findOrFail($id)->delete();
    }
}
