@extends('master')
@section('title', 'Order')
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
    <h3 class="text-white">Order</h3>
</div>
<div class="row justify-content-center">
    @foreach ($products as $product)
    <div class="col">
        <div class="card mx-auto" style="width: 18rem;">
            <img src="{{ asset('storage/' . $product->img_path) }}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h5>${{ $product->price }}.00</h5>
                <a href="{{ route('order.process_view', $product->id) }}" class="btn btn-success">Order Now</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif

@endsection