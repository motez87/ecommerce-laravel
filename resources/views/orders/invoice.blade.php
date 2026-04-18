@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-0">🧾 FACTURE</h4>
                        </div>
                        <div class="col-md-6 text-end">
                            <h5 class="mb-0">ShopEase</h5>
                            <small>Tunis, Tunisie</small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <strong>Facture N°:</strong> {{ $order->order_number }}<br>
                            <strong>Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}<br>
                            <strong>Statut:</strong> 
                            @if($order->status == 'pending')
                                <span class="badge bg-warning">En attente</span>
                            @elseif($order->status == 'validated')
                                <span class="badge bg-success">Validée</span>
                            @else
                                <span class="badge bg-danger">Annulée</span>
                            @endif
                        </div>
                        <div class="col-md-6 text-end">
                            <strong>Client:</strong><br>
                            {{ Auth::user()->name }}<br>
                            {{ Auth::user()->email }}
                        </div>
                    </div>
                    
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Produit</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ number_format($item->price, 3) }} TND</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity, 3) }} TND</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-primary">
                                <th colspan="3" class="text-end">TOTAL :</th>
                                <th>{{ number_format($order->total_amount, 3) }} TND</th>
                            </tr>
                        </tfoot>
                    </table>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Retour</a>
                        <button onclick="window.print()" class="btn btn-primary">Imprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .btn, .navbar, footer {
        display: none !important;
    }
}
</style>
@endsection