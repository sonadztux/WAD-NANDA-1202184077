<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller{
    public function index() {
        $products = Product::all();
        return view('order', compact('products'));
    }

    public function process_view($id) {
        $product = Product::find($id);
        return view('processorder', compact('product'));
    }

    public function process($id, Request $request) {
        $product = Product::find($id);
        $product->stock = $product->stock - $request->quantity;

        $order = new Order;
        $order->product_id = $id;
        $order->amount = $product->price * $request->quantity;
        $order->buyer_name = $request->name;
        $order->buyer_contact = $request->contact;

        $product->save();
        $order->save();
        return redirect(route('order.history'));
    }

    public function history() {
        $orders = Order::all();
        $products_name = array();
        foreach($orders as $order) {
            $product = Product::find($order->product_id);
            array_push($products_name, $product->name);
        }
        return view('history', compact('orders', 'products_name'));
    }
}
