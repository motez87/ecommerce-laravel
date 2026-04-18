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
                        <div class="col-md-6">
                            <h5>{{ $item['title'] }}</h5>
                        </div>
                        <div class="col-md-2">
                            <p class="mb-0">{{ number_format($item['price'], 2) }} €</p>
                        </div>
                        <div class="col-md-2">
                            <p class="mb-0">Quantité: {{ $item['quantity'] }}</p>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
                    <h4>Total</h4>
                    <h3 class="text-primary">{{ number_format($total, 2) }} €</h3>
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100 mt-3">Valider la commande</button>
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