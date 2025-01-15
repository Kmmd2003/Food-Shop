<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name' , 'price' , 'category_id' , 'restaurant_id'];
    public function category(){
        return $this->belongsTo(Category::class)->first();
    }

    public function restaurant(){
        return $this->belongsTo(Restaurant::class)->first();
    }
}
