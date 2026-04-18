@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nos Produits</h1>
    
    <div class="row">
        @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm product-card">
                @if($product->image)
                <div class="image-container">
                    <img src="{{ asset($product->image) }}" class="card-img-top product-image" alt="{{ $product->title }}" style="height: 300px; width: 100%; object-fit: contain; background-color: #f8f9fa; padding: 20px;">
                </div>
                @else
                <img src="https://placehold.co/600x400/667eea/white?text={{ urlencode($product->title) }}" class="card-img-top product-image" alt="{{ $product->title }}" style="height: 300px; width: 100%; object-fit: contain; background-color: #f8f9fa; padding: 20px;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($product->description, 80) }}</p>
                    <p class="card-text"><strong class="text-primary fs-4">{{ number_format($product->price, 3) }} TND</strong></p>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary w-100">Voir détails</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <p>Aucun produit disponible.</p>
        </div>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>

<style>
.product-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2) !important;
}

.image-container {
    overflow: hidden;
}

.product-image {
    transition: transform 0.4s ease;
}

.product-card:hover .product-image {
    transform: scale(1.08);
}
</style>
@endsection