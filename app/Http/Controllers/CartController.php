<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Product; // Call Product Model
use App\Models\Cart; // Call Cart Model

class CartController extends Controller
{
    public function view()
    {
        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->get();
        return view('shopping_cart', compact('carts'));
    }

    public function add(Request $request)
    {
        // Retrieve current auth user
        // Retrieve product id and quantity submit through form
        $user = auth()->user(); 
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::findOrFail($product_id);

        // Check whether product id exists in cart table (retu)
        $existing = Cart::where('user_id', $user->id)
                            ->where('product_id', $product_id)
                            ->where('payment_status', 0) // assume status 1 = paid, 2 = unpaid
                            ->first();

        if ($existing) {
            // If found exist and unpaid, update quantity and total price
            $existing->quantity += $quantity;
            $existing->total_price = $existing->product->price * $existing->quantity;
            $existing->save();
        } 
        
        else { // If not found, create new cart item
            $cart = Cart::create([
                'user_id' => $user->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'total_price' => $product->price * $quantity, // retrieve product price x quantity
                'payment_status' => 0 
            ]);
        }

        return  redirect()->intended(RouteServiceProvider::HOME)->with('success', 'Item added successfully!');
    }

    public function update(Request $request)
    {
        $cart_id = $request->input('id');
        $quantity = $request->input('quantity');
        $total_price = $request->input('total_price');

        $cart = Cart::findOrFail($cart_id);
        $cart->quantity = $quantity;
        $cart->total_price = $total_price;
        $cart->save();

        return response()->json(['status' => 'success', 'message' => 'Cart updated successfully']);
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::find($id);
        if (!$cart) {
            return response()->json(['message' => 'Cart not found.'], 404);
        }

        $cart->delete();

        if ($request->ajax()) {
            return response()->json(['message' => 'Cart item deleted successfully.']);
        } else {
            return redirect()->back()->with('success', 'Cart item deleted successfully.');
        }
    }

    public function checkout(Request $request)
    {
        // check if "is_ok" exists in the Request
        if ($request->has('is_ok')) {

            // get "is_ok" parameter
            $selectedIds = $request->input('is_ok');
        
            // check if retrieved value is an arrray
            if (is_array($selectedIds)) {

                // Retrieve cart data using whereIn method
                $checkout_data = Cart::whereIn('id', $selectedIds)
                    ->with('product')
                    ->get()
                    ->toArray();

                // Pass the $checkout_data array to the checkout view
                return view('checkout',compact('checkout_data'));
            }
        }
    }
}
