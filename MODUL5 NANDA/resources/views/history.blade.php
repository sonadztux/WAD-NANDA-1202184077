@extends('master')
@section('title', 'Order History')
@section('content')

@if ($orders->isEmpty())
<div class="row justify-content-center">
    <p class="text-white">There is no data...</p>
</div>
<div class="row justify-content-center">
    <a class="btn btn-info" href="{{ route('product.add_view') }}" role="button">Order Now</a>
</div>
@else
<div class="text-center">
    <h3 class="text-white">History</h3>
</div>
<div class="row justify-content-center mt-3">
    <table class="table table-striped bg-light">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Product</th>
                <th scope="col">Buyer Name</th>
                <th scope="col">Contact</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $products_name[$index] }}</td>
                <td>{{ $order->buyer_name }}</td>
                <td>{{ $order->buyer_contact }}</td>
                <td>${{ $order->amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@endsection