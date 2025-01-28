<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Ctegory;
use App\Models\Product;
use App\Models\ProductBasket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $restaurants = Restaurant::orderByDesc('created_at')->limit(5)->get();
        $bestRestaurants = Restaurant::orderByDesc('counter')->limit(5)->get();
        $categories = Category::all();
        $userCount = User::all()->count();

        $sliderShowRestaurant = Restaurant::where('is_slide' , '=' , 1)->orderbyDesc('updated_at')->limit(3)->get();
        return view('front.index' , [
         'restaurants' => $restaurants ,
         'bestRestaurants' => $bestRestaurants , 
         'categories' => $categories ,
         'userCount' => $userCount , 
         'sliderShowRestaurant' => $sliderShowRestaurant
        ]);
    }
   

    public function restaurants($id , Request $request){
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
        return view('front.restaurant' , [
            'restaurant' => $restaurant , 
            'products' => $products ,
            'categories' => $categories , 
            'baskets' => $baskets
        ]);
    }

    public function search(Request $request){
        $q = $request->get('q');
        $restaurants = Restaurant::where('title' , 'like', '%'.$q.'%')->get();
        return view('front.search' , ['restaurants' => $restaurants]);
    }

    public function category($id){
        $category = Category::find($id);
        return view('front.category' , ['category' => $category]);
    }

    public function basketList(){
        $basketCount = ProductBasket::all()->count();
        $baskets = ProductBasket::where('user_id' , '=' , Auth::user()->id)->get();
        return view('front.basket' , [
            'baskets' => $baskets ,
            'basketCount' => $basketCount 
        ]);
    }

    public function removeBasket($id){
        $basket = Product::where('user_id' , '=' , Auth::user()->id)
        ->where('id' , '=' , $id)
        ->where('is_paying' , '=' , 0)->fist();
        if($basket){
            $basket->delete();
            return redirect()->back();
        }
        else{
            return "not found!";
        }
    }

    /* Controller Method */
}


