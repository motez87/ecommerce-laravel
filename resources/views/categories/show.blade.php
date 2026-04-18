@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Catégorie: {{ $category->name }}</h1>
    
    <div class="row">
        @forelse($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($product->image)
                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->title }}" style="height: 200px; object-fit: cover;">
                @else
                <img src="https://placehold.co/400x300/667eea/white?text={{ urlencode($product->title) }}" class="card-img-top" alt="{{ $product->title }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                    <p class="card-text"><strong>{{ number_format($product->price, 3) }} TND</strong></p>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-primary">Voir détails</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <p>Aucun produit dans cette catégorie.</p>
        </div>
        @endforelse
    </div>
    
    {{ $products->links() }}
</div>
@endsection