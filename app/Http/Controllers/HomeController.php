<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Ctegory;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $restaurants = Restaurant::paginate(14);
        return view('front.index' , ['restaurants' => $restaurants]);
    }
   

    public function restaurants($id){
        $restaurant = Restaurant::findOrFail($id);
        $products = Product::where('restaurant_id' , '=' , $restaurant->id)->get();
        return view('front.restaurant' , [
            'restaurant' => $restaurant , 
            'products' => $products
        ]);
    }
}
