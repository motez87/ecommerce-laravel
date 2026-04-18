@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Ajouter un produit</h1>
        <a href="{{ route('admin.products') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Nom du produit</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Prix (TND)</label>
                        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Catégorie</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">-- Sélectionner une catégorie --</option>
                            <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>📱 Smartphones</option>
                            <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>💻 Ordinateurs portables</option>
                            <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>📟 Tablettes</option>
                            <option value="4" {{ old('category_id') == 4 ? 'selected' : '' }}>🔌 Accessoires</option>
                            <option value="5" {{ old('category_id') == 5 ? 'selected' : '' }}>🎧 Audio & Casques</option>
                            <option value="6" {{ old('category_id') == 6 ? 'selected' : '' }}>📺 TV & Home Cinéma</option>
                            <option value="7" {{ old('category_id') == 7 ? 'selected' : '' }}>🎮 Gaming</option>
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Image du produit</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Formats acceptés: JPG, PNG, GIF. Max 10MB</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Ajouter le produit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection