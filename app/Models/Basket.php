<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = ['user_id' , 'is_paid'];
    public function restaurant(){
        return $this->belongsTo(restaurant::class)->first();
    }

    public function product(){
        return $this->belongsTo(product::class)->first();
    }
}
