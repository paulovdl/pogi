@extends('frontend.layouts.front_design')

@section('content')
<section>
        <div class="container">
        <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="/cart">My Cart</a></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-sm-12 padding-right">
                    <div class="features_items"><!--featured_items-->
                        <h2 class="title text-center">Products</h2>
                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products"> 
                                        <div class="productinfo text-center">
                                            <h2>₱{{$product->price}}</h2>
                                            <p>{{$product->name}}</p>
                                            <a href="{{ url('product/'.$product->id) }}"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button></a>
                                        </div>                                  
                                </div>                           
                            </div>
                        </div>
                        @endforeach
                        
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
