<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function validateOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'validated';
        $order->save();
        
        return redirect()->back()->with('success', 'Commande validée avec succès !');
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'cancelled';
        $order->save();
        
        return redirect()->back()->with('success', 'Commande annulée avec succès !');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return redirect()->route('admin.orders.index')->with('success', 'Commande supprimée avec succès !');
    }

    public function invoice($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return view('orders.invoice', compact('order'));
    }
}