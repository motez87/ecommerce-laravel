@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Mes Commandes</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    @if(count($orders) > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>N° Commande</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                <td>{{ number_format($order->total_amount, 3) }} TND</td>
                                <td>
                                    @if($order->status == 'pending')
                                        <span class="badge bg-warning">En attente</span>
                                    @elseif($order->status == 'validated')
                                        <span class="badge bg-success">Validée</span>
                                    @else
                                        <span class="badge bg-danger">Annulée</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">Voir détails</a>
                                    <a href="{{ route('orders.invoice', $order) }}" class="btn btn-sm btn-info">Facture</a>
                                    
                                    @if($order->status == 'pending')
                                    <form action="{{ route('orders.cancel', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette commande ?')">
                                            Annuler
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-box fa-4x text-muted mb-3"></i>
        <p>Vous n'avez pas encore passé de commande</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Découvrir nos produits</a>
    </div>
    @endif
</div>
@endsection