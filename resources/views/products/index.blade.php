@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nos Produits</h1>
    
    <!-- Recherche AJAX -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Recherche instantanée</label>
                    <input type="text" id="search-input" class="form-control form-control-lg" placeholder="🔍 Tapez pour rechercher...">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filtres -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-bold">Catégorie</label>
                    <select id="category-filter" class="form-select">
                        <option value="">Toutes</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Prix min</label>
                    <input type="number" id="min-price" class="form-control" placeholder="0">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">Prix max</label>
                    <input type="number" id="max-price" class="form-control" placeholder="10000">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold">Trier par</label>
                    <select id="sort-filter" class="form-select">
                        <option value="">Par défaut</option>
                        <option value="price_asc">Prix croissant</option>
                        <option value="price_desc">Prix décroissant</option>
                        <option value="name_asc">Nom A-Z</option>
                        <option value="name_desc">Nom Z-A</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button id="reset-filters" class="btn btn-secondary w-100">Reset</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Résultats -->
    <div id="products-list">
        @include('products.partials.product_list', ['products' => $products])
    </div>
    
    <div id="pagination-links" class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let timeout;
    
    function loadProducts() {
        $.ajax({
            url: '{{ route("home") }}',
            data: {
                search: $('#search-input').val(),
                category: $('#category-filter').val(),
                min_price: $('#min-price').val(),
                max_price: $('#max-price').val(),
                sort: $('#sort-filter').val(),
                ajax: 1
            },
            success: function(data) {
                $('#products-list').html(data);
                $('#pagination-links').hide();
            }
        });
    }
    
    $('#search-input').on('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(loadProducts, 300);
    });
    
    $('#category-filter, #min-price, #max-price, #sort-filter').on('change', loadProducts);
    
    $('#reset-filters').on('click', function() {
        $('#search-input').val('');
        $('#category-filter').val('');
        $('#min-price').val('');
        $('#max-price').val('');
        $('#sort-filter').val('');
        loadProducts();
    });
});
</script>

<style>
.product-card {
    transition: all 0.3s ease;
}
.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2) !important;
}
.product-image {
    transition: transform 0.4s ease;
}
.product-card:hover .product-image {
    transform: scale(1.08);
}
.image-container {
    overflow: hidden;
}
</style>
@endsection