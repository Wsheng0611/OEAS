<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'price', 'image', 
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the inverse relationship with Cart model
    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
