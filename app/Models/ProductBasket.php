<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBasket extends Model
{
    protected $fillable = ['product_id' , 'restaurant_id' , 'count' , 'user_id' , 'basket_id' , 'is_paying'];
    public function restaurant(){
        return $this->belongsTo(restaurant::class)->first();
    }

    public function product(){
        return $this->belongsTo(product::class)->first();
    }
}
