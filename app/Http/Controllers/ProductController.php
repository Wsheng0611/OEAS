<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function view($id = null)
    {
        if ($id) {
            $category = Category::findOrFail($id);
        $products = $category->getAllProducts();
        } else {
            $products = Product::all();
        }
        return view('product_list', compact('products'));
       
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product'));
    }
}
