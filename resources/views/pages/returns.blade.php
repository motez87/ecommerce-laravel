@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Politique de Retour</h4>
                </div>
                <div class="card-body">
                    <h5>Retour sous 14 jours - Satisfait ou remboursé</h5>
                    <p>Chez ShopEase, votre satisfaction est notre priorité. Vous disposez de 14 jours à compter de la réception de votre commande pour exercer votre droit de rétractation.</p>
                    
                    <h6 class="mt-4">Conditions :</h6>
                    <ul>
                        <li>Le produit doit être retourné dans son emballage d'origine</li>
                        <li>Le produit ne doit pas avoir été utilisé</li>
                        <li>Les frais de retour sont à la charge du client</li>
                    </ul>
                    
                    <h6 class="mt-4">Procédure :</h6>
                    <ol>
                        <li>Contactez notre service client</li>
                        <li>Imprimez l'étiquette de retour</li>
                        <li>Déposez le colis dans un point relais</li>
                        <li>Le remboursement sera effectué sous 7 jours</li>
                    </ol>
                    
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
