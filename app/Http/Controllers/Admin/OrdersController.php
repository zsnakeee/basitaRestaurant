<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function update(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back();
    }
}
