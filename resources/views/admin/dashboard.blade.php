@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h3>{{ App\Models\User::count() }}</h3>
                    <p>Utilisateurs</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h3>{{ App\Models\Product::count() }}</h3>
                    <p>Produits</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h3>{{ App\Models\Order::count() }}</h3>
                    <p>Commandes</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h3>{{ App\Models\Order::where('status', 'pending')->count() }}</h3>
                    <p>Commandes en attente</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Tableau de bord Admin</h5>
        </div>
        <div class="card-body">
            <p>Bienvenue dans l'espace administrateur, <strong>{{ Auth::user()->name }}</strong> !</p>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('admin.users') }}" class="btn btn-outline-primary w-100 mb-2">
                        <i class="fas fa-users"></i> Gérer les utilisateurs
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.products') }}" class="btn btn-outline-success w-100 mb-2">
                        <i class="fas fa-boxes"></i> Gérer les produits
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-info w-100 mb-2">
                        <i class="fas fa-shopping-cart"></i> Gérer les commandes
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection