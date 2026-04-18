@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Mon Panier</h1>
    
    @if(count($cart) > 0)
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    @foreach($cart as $item)
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-5">
                            <h5>{{ $item['title'] }}</h5>
                        </div>
                        <div class="col-md-2">
                            <p class="mb-0">{{ number_format($item['price'], 3) }} TND</p>
                        </div>
                        <div class="col-md-2">
                            <p class="mb-0">Quantité: {{ $item['quantity'] }}</p>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-0 fw-bold">{{ number_format($item['price'] * $item['quantity'], 3) }} TND</p>
                        </div>
                        <div class="col-md-1">
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @if(!$loop->last)
                    <hr>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4>Récapitulatif</h4>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Sous-total:</span>
                        <span>{{ number_format($total, 3) }} TND</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Livraison:</span>
                        <span>Gratuite</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total:</strong>
                        <strong class="text-primary">{{ number_format($total, 3) }} TND</strong>
                    </div>
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 py-2">
                            <i class="fas fa-check-circle"></i> Valider la commande
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="text-center py-5">
        <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
        <p>Votre panier est vide</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Continuer mes achats</a>
    </div>
    @endif
</div>
@endsection