<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductBasket;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontApiController extends Controller
{
    public function search($q){
        return Restaurant::where('title' , 'like' , '%' . $q . '%')->paginate(10);
    }

    public function index(){
        $restaurants = Restaurant::orderByDesc('created_at')->limit(5)->get();
        $bestRestaurants = Restaurant::orderByDesc('counter')->limit(5)->get();
        $categories = Category::all();
        $userCount = User::all()->count();
        $sliderShowRestaurant = Restaurant::where('is_slide' , '=' , 1)->orderbyDesc('updated_at')->limit(3)->get();
        $response = [
            'restaurants' => $restaurants ,
            'bestRestaurants' => $bestRestaurants , 
            'categories' => $categories ,
            'userCount' => $userCount , 
            'sliderShowRestaurant' => $sliderShowRestaurant
           ];
           return response($response , 200);
    }

    public function restaurant($id , Request $request){
        $restaurant = Restaurant::findOrFail($id);
        $baskets = null;
        if (Auth::user()) {
            $baskets = ProductBasket::where('user_id' , '=' , Auth::user()->id)->where('is_paying' , '=' , 0)->get();
        }
        $categories = Category::all();
        if ($request->get('category')) {
            $products = Product::where('restaurant_id' , '=' , $restaurant->id)->where('category_id' , '=' , $request->get('category'))->get();
        }
        else {
            $products = Product::where('restaurant_id' , '=' , $restaurant->id)->get();
        }
        Restaurant::findOrFail($id)
        ->update([
            'counter' => $restaurant->counter + 1
        ]);
        $response = [
            'restaurant' => $restaurant , 
            'products' => $products ,
            'categories' => $categories , 
            'baskets' => $baskets
        ];
        return response($response , 200);
    }
}
