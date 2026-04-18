@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->title }}">
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $product->title }}</h1>
            <p class="text-muted">Catégorie: {{ $product->category->name }}</p>
            <h3 class="text-primary">{{ number_format($product->price, 2) }} €</h3>
            <p>{{ $product->description }}</p>
            
            <form action="{{ route('cart.add', $product) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>
@endsection