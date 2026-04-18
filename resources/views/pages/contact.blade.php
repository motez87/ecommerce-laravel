@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">📞 Contactez-nous</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><i class="fas fa-phone"></i> Téléphone</h5>
                            <p>+33 1 23 45 67 89<br>Du lundi au vendredi, 9h-18h</p>
                        </div>
                        <div class="col-md-6">
                            <h5><i class="fas fa-envelope"></i> Email</h5>
                            <p>contact@shopease.com<br>support@shopease.com</p>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h5><i class="fas fa-map-marker-alt"></i> Adresse</h5>
                        <p>123 Rue du Commerce<br>1000 Tunis, Tunisie</p>
                    </div>
                    
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-arrow-left"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
