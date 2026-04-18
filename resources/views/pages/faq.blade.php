@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">❓ Foire Aux Questions (FAQ)</h4>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Comment passer une commande ?</h5>
                        <p>Ajoutez les produits au panier, puis validez votre commande. Vous recevrez une confirmation par email.</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Quels sont les délais de livraison ?</h5>
                        <p>La livraison prend entre 2 et 5 jours ouvrés. La livraison est gratuite dès 50 TND.</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Comment suivre ma commande ?</h5>
                        <p>Connectez-vous à votre compte et allez dans "Mes commandes" pour suivre l'état de votre commande.</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Puis-je retourner un produit ?</h5>
                        <p>Oui, vous disposez de 14 jours pour retourner un produit. Consultez notre <a href="{{ route('pages.returns') }}">page Retours</a>.</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>Comment contacter le service client ?</h5>
                        <p>Vous pouvez nous contacter via la page <a href="{{ route('pages.contact') }}">Contact</a> ou par téléphone au +33 1 23 45 67 89.</p>
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