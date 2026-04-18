<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(403);
        }
        return view('orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide');
        }
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'status' => 'pending',
            'total_amount' => $total
        ]);
        
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
        }
        
        session()->forget('cart');
        
        return redirect()->route('orders.index')->with('success', 'Commande passée avec succès !');
    }

    public function cancel(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(403);
        }
        
        if ($order->status == 'pending') {
            $order->update(['status' => 'cancelled']);
            return redirect()->route('orders.index')->with('success', 'Commande annulée avec succès.');
        }
        
        return redirect()->route('orders.index')->with('error', 'Cette commande ne peut pas être annulée.');
    }

    public function invoice(Order $order)
    {
        if ($order->user_id != auth()->id()) {
            abort(403);
        }
        
        return view('orders.invoice', compact('order'));
    }
}