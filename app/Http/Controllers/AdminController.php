<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\RestaurantRequest;
use Laravel\Prompts\Prompt;
use tidy;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.panel');
    }

    public function categoryList(){
        return view('admin.category-list' , ['categories' => Category::all()]);
    }

    public function productList(){
        return view('admin.product-list' , ['products' => Product::all()]);
    }

    public function restaurantList(){
        return view('admin.restaurant-list' , ['restaurants' => Restaurant::all()]);
    }

    public function restaurantCreate(){
        return view('admin.restaurant-create');
    }

    public function restaurantInsert(RestaurantRequest $request){
        $request->validated();
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
        return redirect(route('restaurant-List'));
    }

    public function categoryCreate(){
        return view('admin.category-create');
    }

    public function categoryInsert(Request $request){
        $name = $request->input('name');
        $description = $request->input('description');

        Category::create([
            'name' => $name , 
            'description' => $description 
        ]);
        return redirect(route('category-List'));
    }

    public function productCreate(){
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.product-create' , [
            'restaurants' => $restaurants , 
            'categories' => $categories
        ]);
    }

    public function productInsert(Request $request){
        Product::create([
            'name' => $request->input('name') , 
            'price' => $request->input('price') , 
            'category_id' => $request->input('category') , 
            'restaurant_id' => $request->input('restaurant') , 
            
        ]);
        return redirect(route('product-List'));
    }

    public function restaurantEdit($id){
        $restaurant = Restaurant::find($id);
        // $restaurant =  Restaurant::where('id' , '=' , $id)->first();  // secound method
        return view('admin.restaurant-edit' , ['restaurant' => $restaurant]);
    }

    public function restaurantUpdate(Request $request){
        $restaurant = Restaurant::findOrFail($request->input('id'));
        
        if($restaurant->title != $request->input('name')){
            $request->validate([
                'name' => 'required|unique:restaurants,title|string|min:3|max:32'
        ]);
    }

        $image = false;
        if ($request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:png,jpg|max:2000'
            ]);
            
            $image = time() .'-'.  $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('img'), $image);
        }

        $request->validate([
            'address' => 'required|max:600' , 
            'description' => 'required|max:600'
    ]);

       
        if($image){
            $restaurant
        ->update([
            'title' => $request->input('name') , 
            'address' => $request->input('address') ,
            'image' => $request->file('image') , 
            'is_slide' => $request->input('is_slide') ?? 0 , 
            'description' => $request->input('description')
        ]);
        }
        else{
            $restaurant
            ->update([
                'title' => $request->input('name') , 
                'address' => $request->input('address') ,
                'is_slide' => $request->input('is_slide') ?? 0 ,
                'description' => $request->input('description')
            ]);
        }

        

        
        return redirect(route('restaurant-List'));
    }

    public function categoryEdit($id){
        $category = Category::find($id);
        return view('admin.category-edit' , ['category' => $category]);
    }

    public function categoryUpdate(Request $request){
        Category::findOrFail($request->input('id'))
        ->update([
            'name' =>$request->input('name') ,
            'description' =>$request->input('description') , 
        ]);
        return redirect(route('category-List'));
    }

    public function productEdit($id){
        $product = Product::find($id);
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.product-edit' , [
            'product' => $product , 
            'categories' => $categories , 
            'restaurants' => $restaurants
        ]);
    }

    public function productUpdate(Request $request){
        Product::findOrFail($request->input('id'))
        ->update([
            'name' => $request->input('name') , 
            'price' => $request->input('price') , 
            'category_id' => $request->input('category') , 
            'restaurant_id' => $request->input('restaurant') 
        ]);
        return redirect(route('product-List'));
    }

    public function restaurantDelete($id){
        Restaurant::findOrFail($id)
        ->delete();
        return redirect(route('restaurant-List'));
    }

    public function categoryDelete($id){
        Category::findOrFail($id)
        ->delete();
        return redirect(route('category-List'));
    }

    public function productDelete($id){
        Product::findOrFail($id)
        ->delete();
        return redirect(route('product-List'));
    }
}
