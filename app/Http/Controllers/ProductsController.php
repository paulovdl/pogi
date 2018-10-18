<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('backend.product.view_product')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.add_product');
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
            
            /* generate unique 4 digits */
            $code = mt_rand(1000, 9999);

            /* Saving Process */
            $product = new Product();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->size = $request->input('size');
            $product->code = $code;
            $product->save();

            return redirect('/admin/products')->with('success', 'Product has been added successfully!');
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
        $product = Product::find($id);

        return view('backend.product.edit_product')->with(compact('product'));
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
        if($request->isMethod('put')){

            $this->validate($request, [
                'name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'size' => 'required'

            ]);

            /* generate unique 4 digits */
            $code = mt_rand(1000, 9999);
            
            /* Update Process */
            Product::where(['id'=>$id])->update([

                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'size' => $request->input('size'),
                'code' => $code

            ]);

            return redirect('/admin/products')->with('success', 'Product has been updated successfully!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCode = Product::where(['id'=>$id])->first();

        /* Delete Process */
        Product::where(['id'=>$id])->delete();
        Cart::where('code',$productCode->code)->delete();

        return redirect('/admin/products')->with('success', 'Product has been deleted successfully!');
    }
}
