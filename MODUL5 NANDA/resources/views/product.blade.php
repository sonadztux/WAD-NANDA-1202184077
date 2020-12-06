@extends('master')
@section('title', 'Product')
@section('content')

@if ($products->isEmpty())
<div class="row justify-content-center">
    <p class="text-white">There is no data...</p>
</div>
<div class="row justify-content-center">
    <a class="btn btn-info" href="{{ route('product.add_view') }}" role="button">Add Product</a>
</div> 
@else
<div class="text-center">
    <h3 class="text-white">List Product</h3>
</div>
<div class="row">
    <a class="btn btn-info" href="{{ route('product.add_view') }}" role="button">Add Product</a>
</div>
<div class="row justify-content-center mt-3">
    <table class="table table-striped bg-light">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <a class="btn btn-primary" href="{{ route('product.update_view', $product->id) }}" role="button">Edit</a>
                    &nbsp;&nbsp;||&nbsp;&nbsp;
                    <a class="btn btn-danger" href="{{ route('product.delete', $product->id) }}" role="button" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@endsection