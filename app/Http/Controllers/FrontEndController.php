<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontEndController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('frontend.index')->with(compact('products'));

    }

    public function displayProduct($id = null) {
        $productDetails = Product::where('id', $id)->first();
        //echo "<pre>"; print_r($productDetails); die;
        return view('frontend.product_details')->with(compact('productDetails'));

    }
}
