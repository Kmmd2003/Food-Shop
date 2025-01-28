<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['title' , 'address' , 'image' , 'counter' , 'is_slide' , 'description'];
    use HasFactory;
}
