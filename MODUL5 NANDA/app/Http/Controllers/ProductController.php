<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index() {
        $products = Product::all();
        return view('product', compact('products'));
    }

    public function add($request) {
        $request->validate(['file' => 'required|mimes:jpg,jpeg,png,gif|max:2048']);
        $filename = time().'.'.$request->file->extension();
        $request->file->move(public_path('storage'), $filename);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->img_path = $filename;        

        return redirect(route('product.index'));
    }

    public function update_view($id) {
        $product = Product::find($id);
        return view('updateproduct', compact('product'));
    }

    public function update($id, Request $request) {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;

        if ($request->file == null) {
            $product->img_path = $product->img_path;
        } else {
            $request->validate(['file' => 'required|mimes:jpg,jpeg,png,gif|max:2048']);
            File::delete(public_path('storage').$product->img_path);
            $filename = time() . '.' . $request->file->extension();
            $request->file->move(public_path('storage'), $filename);
            $product->img_path = $filename;
        }

        $product->save();
        return redirect(route('product.update_view', $product->id));
    }

    public function delete($id) {
        $product = Product::find($id);
        File::delete(public_path('storage') . $product->img_path);
        $product->delete();
        return redirect(route('product.index'));
    }
}
