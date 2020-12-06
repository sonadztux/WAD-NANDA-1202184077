@extends('master')
@section('title', 'Update Product')
@section('content')
<div class="text-center">
    <h3 class="text-white">Update Product</h3>
</div>
<div class="row justify-content-center text-white">
    <form method="POST" action="" class="w-75" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">$ USD</div>
                </div>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
                </div>
                <div class="form-group">
                    <label for="file">Image File Input</label>
                    <input type="file" class="form-control-file" id="file" name="file" value="{{ $product->img_path }}">
                </div>
                <button type="submit" name="submit" class="btn btn-info">Update</button>
            </div>
            <div class="col">
                <img src="{{ asset('storage/'.$product->img_path) }}" width="410px" height="200px" alt="pika pika pikachu...">        
            </div>
        </div>
        
    </form>
</div>
@endsection