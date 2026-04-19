@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des Produits</h1>
        <div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success me-2">
                <i class="fas fa-plus"></i> Nouveau produit
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="card shadow-sm">
        <div class="card-body">
            @if($products->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" width="50" height="50" style="object-fit: cover; border-radius: 5px;">
                                    @else
                                        <i class="fas fa-image fa-2x text-muted"></i>
                                    @endif
                                </td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category->name ?? 'Non catégorisé' }}</td>
                                <td>{{ number_format($product->price, 3) }} TND</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce produit ?')">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning">Aucun produit trouvé.</div>
            @endif
        </div>
    </div>
</div>

<style>
.gap-2 {
    gap: 0.5rem;
}
.table td {
    vertical-align: middle;
}
</style>
@endsection