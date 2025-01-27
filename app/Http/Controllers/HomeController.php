<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Ctegory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $restaurants = Restaurant::orderByDesc('created_at')->limit(5)->get();
        $bestRestaurants = Restaurant::orderByDesc('counter')->limit(5)->get();
        $categories = Category::all();
        $userCount = User::all()->count();
        return view('front.index' , [
         'restaurants' => $restaurants ,
         'bestRestaurants' => $bestRestaurants , 
         'categories' => $categories ,
         'userCount' => $userCount
        ]);
    }
   

    public function restaurants($id){
        $restaurant = Restaurant::findOrFail($id);
        Restaurant::findOrFail($id)
        ->update([
            'counter' => $restaurant->counter + 1
        ]);
        $products = Product::where('restaurant_id' , '=' , $restaurant->id)->get();
        return view('front.restaurant' , [
            'restaurant' => $restaurant , 
            'products' => $products
        ]);
    }
}
