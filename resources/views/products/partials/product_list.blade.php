<div class="row">
    @forelse($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm product-card">
            @if($product->image)
            <div class="image-container">
                <img src="{{ asset($product->image) }}" class="card-img-top product-image" alt="{{ $product->title }}" style="height: 250px; width: 100%; object-fit: contain; background-color: #f8f9fa; padding: 20px;">
            </div>
            @else
            <img src="https://placehold.co/600x400/667eea/white?text={{ urlencode($product->title) }}" class="card-img-top product-image" alt="{{ $product->title }}" style="height: 250px; width: 100%; object-fit: contain; background-color: #f8f9fa; padding: 20px;">
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
    <div class="col-12">
        <div class="alert alert-warning text-center">
            <i class="fas fa-search fa-3x mb-3"></i>
            <p>Aucun produit trouvé.</p>
        </div>
    </div>
    @endforelse
</div>