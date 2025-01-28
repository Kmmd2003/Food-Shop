<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductBasket;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function add($product_id , $restaurant_id){
        $product = ProductBasket::where('user_id' , '=' , Auth::user()->id)
        ->where('product_id' , '=' , $product_id)
        ->where('restaurant_id' , '=' , $restaurant_id )
        ->where('is_paying' , '=' , 0)
        ->first();

        if($product){
            $product->update([
                'count' => $product->count + 1
            ]);
        }
        else{
            ProductBasket::create([
                'product_id' => $product_id , 
                'restaurant_id' => $restaurant_id , 
                'count' => 1 , 
                'user_id' => Auth::user()->id , 
            ]);
        }

        
        return redirect()->back();
    }

    public function checkout($user_id){
        $baskets = ProductBasket::where('user_id' , '=' , $user_id)->where('is_paying' , '=' , 0)->get();   
        $wallet = Wallet::where('user_id' , '=' , $user_id)->first();
        $total = 0 ;
        foreach ($baskets as $basket) {
            $total += $basket->product()->price * $basket->count;
        }

        if (isset($wallet->price) && $wallet->price >= $total) {
            $wallet->update([
                'price' => $wallet->price - $total
            ]);
            foreach ($baskets as $basket) {
                $basket->update([
                    'is_paying' => 1
                ]);
            }
        }
        else{
            return "your wallet is empty ! please try to charge it";
        }
        return "operation completed successfully";
    }
}
