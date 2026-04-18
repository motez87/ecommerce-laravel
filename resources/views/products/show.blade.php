@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
            <img src="{{ asset($product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->title }}">
            @else
            <img src="https://placehold.co/600x400/667eea/white?text={{ urlencode($product->title) }}" class="img-fluid rounded shadow" alt="{{ $product->title }}">
            @endif
        </div>
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->title }}</h1>
            <p class="text-muted mb-3">Catégorie: {{ $product->category->name }}</p>
            <h3 class="text-primary mb-3">{{ number_format($product->price, 3) }} TND</h3>
            <p class="mb-4">{{ $product->description }}</p>
            
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Quantité</label>
                    <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 100px">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-cart"></i> Ajouter au panier
                </button>
            </form>
        </div>
    </div>
    
    <hr class="my-5">
    
    <h3 class="mb-4">Avis des clients</h3>
    @forelse($product->reviews as $review)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <strong class="text-primary">{{ $review->user->name }}</strong>
                <div class="text-warning">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>
            </div>
            <p class="mt-2 mb-0">{{ $review->comment }}</p>
            <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
        </div>
    </div>
    @empty
    <p class="text-muted">Aucun avis pour ce produit. Soyez le premier à donner votre avis !</p>
    @endforelse
    
    @auth
    <div class="card mt-4 shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">Donnez votre avis</h5>
            <form action="{{ route('reviews.store', $product) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Note (1-5)</label>
                    <select name="rating" class="form-select" style="width: 150px" required>
                        <option value="1">1 - Très mauvais</option>
                        <option value="2">2 - Mauvais</option>
                        <option value="3">3 - Moyen</option>
                        <option value="4">4 - Bien</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Commentaire</label>
                    <textarea name="comment" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Publier mon avis</button>
            </form>
        </div>
    </div>
    @else
    <div class="alert alert-info mt-4">
        <a href="{{ route('login') }}" class="alert-link">Connectez-vous</a> pour laisser un avis.
    </div>
    @endauth
</div>
@endsection