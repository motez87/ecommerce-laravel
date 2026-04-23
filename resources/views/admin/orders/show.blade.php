@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Détails de la commande #{{ $order->order_number }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Articles commandés</h5>
                </div>
                <div class="card-body">
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
                            <tr class="table-primary">
                                <th colspan="3" class="text-end">Total :</th>
                                <th>{{ number_format($order->total_amount, 3) }} TND</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Informations client</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nom :</strong> {{ $order->user->name }}</p>
                    <p><strong>Email :</strong> {{ $order->user->email }}</p>
                    <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><strong>Statut :</strong> 
                        @if($order->status == 'pending')
                            <span class="badge bg-warning">En attente</span>
                        @elseif($order->status == 'validated')
                            <span class="badge bg-success">Validée</span>
                        @else
                            <span class="badge bg-danger">Annulée</span>
                        @endif
                    </p>
                </div>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    @if($order->status == 'pending')
                    <form action="{{ route('admin.orders.validate', $order->id) }}" method="POST" class="mb-2">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-check"></i> Valider la commande
                        </button>
                    </form>
                    <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" class="mb-2">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Annuler cette commande ?')">
                            <i class="fas fa-times"></i> Annuler la commande
                        </button>
                    </form>
                    @endif
                    <a href="{{ route('admin.orders.invoice', $order->id) }}" class="btn btn-info w-100" target="_blank">
                        <i class="fas fa-print"></i> Voir la facture
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection