@extends('backend.layouts.backend_layout')

@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <h5 class="card-title">Products</h5>
                    <br>                   
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered">
                            <thead>
                                <tr>
                                  <th>Code</th>
                                  <th>Name</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Size</th>                                 
                                  <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="gradeX">
                                    <td>{{ $product->code }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td class="center" style="width:225px;">    
                                    {{ Form::open(array('class' => 'pull-right','method'=>'delete', 'route'=>['products.destroy', $product->id])) }}                                
                                        <a href="/admin/products/{{ $product->id }}/edit" title="Edit Product" class="btn btn-primary btn-mini">Edit</a> |  
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection