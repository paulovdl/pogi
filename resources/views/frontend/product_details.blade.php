@extends('frontend.layouts.front_design')

@section('content')
<div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li><a href="/cart">My Cart</a></li>
        </ol>
    </div>
<div class="container">
<div class="row">
<div class="col-sm-9 padding-right">
    <div class="product-details"><!--product-details-->
        <div class="col-sm-7">
            <form name="addToCartForm" id="addToCartForm" action="{{route('cart.store')}}" method="post">
            @csrf
                <input type="hidden" name="id" id="id" value="{{ $productDetails->id }}">
                <input type="hidden" name="name" id="name" value="{{ $productDetails->name }}">
                <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">   
                <input type="hidden" name="quantity" id="quantity" value="{{ $productDetails->quantity }}">   
                <input type="hidden" name="size" id="size" value="{{ $productDetails->size }}"> 
                <input type="hidden" name="code" id="code" value="{{ $productDetails->code }}">       
                <div class="product-information"><!--/product-information-->                  
                    <h3>Name: {{ $productDetails->name }}</h3>
                    <p id="getCode">Product Code: {{ $productDetails->code}}</p>
                    <p>Product Size: {{ $productDetails->size}}</p>
                    <p>Quantity: <input type="number" name="quantity" value="1" /></p>
                    
                    <button type="submit" class="btn btn-fefault cart" id="cartButton">
                        <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    <p id="getStock"><b>Availability: {{ $productDetails->quantity}} more stocks left</b></p>
    
                </div><!--/product-information-->
            </form>
        </div>
    </div><!--/product-details-->
</div>
</div>
@endsection
   