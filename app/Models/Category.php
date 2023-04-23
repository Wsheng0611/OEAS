<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getAllProducts()
    {
        $categories = Category::where('id', $this->id)
                      ->orWhere('parent_id', $this->id)
                      ->with(['products'])
                      ->get();

        $products = collect([]);

        foreach ($categories as $category) {
            $products = $products->merge($category->products);
        }

        return $products;
    }
}
