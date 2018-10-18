@extends('frontend.layouts.front_design')

@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/">Home</a></li>
				  <li><a href="/cart">My Cart</a></li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>Name</td>
							<td>Price</td>
                            <td>Quantity</td>
                            <td>Sub Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach ($cartItems as $item)
							<tr>
								<td><h4>{{ $item->name }}</h4><p>Code: {{ $item->code }} | Size: {{ $item->size }}</p></td>
								<td><p>₱ {{ $item->price }}</p></td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="{{ url('/cart/update-quantity/'.$item->id.'/1') }}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->cart_quantity }}" autocomplete="off" min="1" size="2" disabled>
                                        <a class="cart_quantity_down" href="{{ url('/cart/update-decrement/'.$item->id.'/1') }}"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">₱ {{ $item->price*$item->cart_quantity }}</p>
                                </td>
								<td class="cart_delete">
                                {{ Form::open(array('class' => 'cart_quantity_delete','method'=>'delete', 'route'=>['cart.destroy', $item->id])) }}                                
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                {{ Form::close() }}
                                </td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<div class="border-top">
                        <li>Grand Total <span>₱ {{$grandTotal}}</span></li>										
					</ul>
						<a class="btn btn-default update" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
@endsection
