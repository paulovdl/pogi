@extends('backend.layouts.backend_layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('products.store')}}" name="add_product" id="add_product" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label for="position-bottom-left">Name</label>
                                <input type="text" class="form-control" data-position="bottom left" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="position-bottom-left">Price</label>
                                <input type="number" class="form-control" data-position="bottom left" name="price" id="price">
                            </div>
                            <div class="form-group">
                                <label for="position-bottom-left">Quantity</label>
                                <input type="number" class="form-control" data-position="bottom left" name="quantity" id="quantity">
                                </div>
                            <div class="form-group">
                                <label for="position-bottom-left">Size</label>
                                <input type="text" class="form-control" data-position="bottom left" name="size" id="size">
                            </div>
                            <br>
                            <div class="border-top">
                                <br>
                                <button type="submit" class="btn btn-success">Save</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <input type="button" class="btn btn-danger" onclick="history.back();" value="Back">
                            </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection