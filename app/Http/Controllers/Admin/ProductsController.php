<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('admin.products-create', compact('categories'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Categories::all();
        return view('admin.products-edit', compact('product', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image->store('public/products'),
        ]);

        return redirect()->route('admin.products');
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('admin.products');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required',
        ]);

        $product = Product::find($id);
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if($request->has('image'))
            $product->image = $request->image->store('public/categories');

        $product->save();

        return redirect()->route('admin.products');
    }
}
