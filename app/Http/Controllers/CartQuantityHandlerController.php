<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class CartQuantityHandlerController extends Controller
{
    public function updateCartQuantity($id = null) {
        
        $getCartQuantity = Cart::where('id',$id)->first();
        $getProductQuantity = Product::where('code',$getCartQuantity->code)->first();
        
		if( $getProductQuantity->quantity > 0) {
            Cart::where('id',$id)->increment('cart_quantity',1);
            Product::where('code', $getProductQuantity->code)->decrement('quantity',1);
			return redirect('cart');
		} else {
			return redirect('cart')->with('error','Sorry out of stock!');
		}
	}

	public function updateCartQuantityDecrement($id = null) {
        $quantity = Cart::where('id',$id)->first();
        $getProductQuantity = Product::where('code',$quantity->code)->first();
        
		if($quantity->cart_quantity>1) {
            Cart::where('id',$id)->decrement('cart_quantity',1);
            Product::where('code', $quantity->code)->increment('quantity',1);
			return redirect('cart');
		} else {
			return redirect('cart')->with('error','Minimum order is 1!');
		}
		
    }
    
    public static function grandTotal($total = null) {
        $cartItems = Cart::all();

        foreach ($cartItems as $items) {
            $total += $items->cart_quantity * $items->price;
        }

        return $total;
    }
}
