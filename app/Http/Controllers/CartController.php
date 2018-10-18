<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Http\Controllers\CartQuantityHandlerController;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::all();
        
        $grandTotal = CartQuantityHandlerController::grandTotal();
        return view('frontend.cart')->with(compact('cartItems','grandTotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
            
            $this->validate($request, [
                'name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'size' => 'required'
            ]);

            $data = $request->all();
            
            $countCartItem = Cart::where(['code'=>$data['code']])->count();
            $countProduct = Product::where('code', $data['code'])->first();

            if($countCartItem>0) {

                return redirect()->back()->with('error','Product has been added already!');

            } else if($countProduct->quantity == 0) {

                return redirect()->back()->with('error','Out of stock!');  

            } else {

                /* Saving Process */
                $item = new Cart();
                $item->name = $data['name'];
                $item->price = $data['price'];
                $item->cart_quantity = $data['quantity'];
                $item->size = $data['size'];
                $item->code = $data['code'];
                $item->save();

                /* decrement of quantity in product */
                Product::where('code', $data['code'])->decrement('quantity', $data['quantity']);

                return redirect('/cart')->with('success', 'Item has been added to the cart successfully!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::where(['id'=>$id])->delete();

        return redirect('/cart')->with('success', 'Item has been deleted successfully!');
    }
}
