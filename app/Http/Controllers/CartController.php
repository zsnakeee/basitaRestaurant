<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart');
        $total = 0;
        if(isset($cart)) {
            foreach ($cart as $item)
                $total += $item['quantity'] * $item['price'];
        }

        return view('cart', compact('total'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->id);
        $cart = Session::get('cart', []);

        if (isset($cart[$request->id]))
            $cart[$request->id]['quantity']++;
        else {
            $cart[$request->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        Session::put('cart', $cart);
        return response()->json(['success' => true, 'count' => count($cart)]);
    }

    public function remove(Request $request)
    {
        $cart = Session::get('cart');
        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            Session::put('cart', $cart);
        }

        return response()->json(['success' => true, 'count' => count($cart)]);
    }

    public function update(Request $request)
    {
        $cart = Session::get('cart');
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
        }

        $price = $cart[$request->id]['price'] * $request->quantity;
        $total = 0;
        foreach ($cart as $item)
            $total += $item['quantity'] * $item['price'];


        return response()->json(['success' => true, 'count' => count($cart), 'total' => $total, 'price' => $price]);
    }

    public function checkout()
    {
        $cart = Session::get('cart');
        foreach ($cart as $id => $product) {
            Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);
        }

        Session::forget('cart');
        return redirect()->route('orders');
    }
}
