@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Commande #{{ $order->order_number }}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <strong>Date de commande :</strong><br>
                            {{ $order->created_at->format('d/m/Y H:i') }}
                        </div>
                        <div class="col-md-6">
                            <strong>Statut :</strong><br>
                            @if($order->status == 'pending')
                                <span class="badge bg-warning">En attente</span>
                            @elseif($order->status == 'validated')
                                <span class="badge bg-success">Validée</span>
                            @else
                                <span class="badge bg-danger">Annulée</span>
                            @endif
                        </div>
                    </div>
                    
                    <h5>Articles commandés</h5>
                    <table class="table">
                        <thead>
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
                            <tr class="table-active">
                                <th colspan="3" class="text-end">Total :</th>
                                <th>{{ number_format($order->total_amount, 3) }} TND</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Informations</h5>
                </div>
                <div class="card-body">
                    <p><strong>Mode de livraison :</strong><br>Livraison standard</p>
                    <p><strong>Frais de livraison :</strong><br>Gratuite</p>
                    <hr>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary w-100">
                        <i class="fas fa-arrow-left"></i> Retour à mes commandes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection