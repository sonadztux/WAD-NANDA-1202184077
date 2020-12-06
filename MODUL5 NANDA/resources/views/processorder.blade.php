@extends('master')
@section('title', 'Process Order')
@section('content')
<div class="text-center">
    <h3 class="text-white">Order</h3>
</div>
<div class="card m-3">
    <div class="row m-3">
        <div class="col">
            <img src="{{ asset('storage/' . $product->img_path) }}" width="500px" height="300px">
        </div>
        <div class="col">
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->description }}</p>
            <p>Stock : {{ $product->stock }}</p>
            <h4>${{ $product->price }}.00</h4>
        </div>
    </div>
</div>

<div class="card m-3">
    <div class="text-center mt-3">
        <h5>Buyer Information</h5>
    </div>
    <div class="row m-3">
        <form method="POST" class="w-100" action="{{ route('order.process', $product->id) }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="number" class="form-control" id="contact" name="contact" placeholder="">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="">
            </div>
            <button type="submit" name="submit" class="btn btn-info">Process</button>
        </form>
    </div>
</div>

@endsection
