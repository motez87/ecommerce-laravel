<footer class="bg-dark text-white pt-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-store"></i> ShopEase</h5>
                <p>Votre boutique en ligne de confiance depuis 2024. Des milliers de produits à prix imbattables.</p>
                <div>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold mb-3">Aide</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white-50 text-decoration-none small">Accueil</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none small">Contact</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none small">Livraison</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none small">Retours</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none small">FAQ</a></li>
                </ul>
            </div>
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold mb-3">Mon compte</h6>
                <ul class="list-unstyled">
                    @guest
                        <li><a href="{{ route('login') }}" class="text-white-50 text-decoration-none small">Connexion</a></li>
                        <li><a href="{{ route('register') }}" class="text-white-50 text-decoration-none small">Inscription</a></li>
                    @else
                        <li><a href="{{ route('logout') }}" class="text-white-50 text-decoration-none small" 
                               onclick="event.preventDefault(); document.getElementById('logout-form-footer').submit();">Déconnexion</a></li>
                        <form id="logout-form-footer" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    @endguest
                    <li><a href="{{ route('orders.index') }}" class="text-white-50 text-decoration-none small">Mes commandes</a></li>
                    <li><a href="{{ route('cart.index') }}" class="text-white-50 text-decoration-none small">Mon panier</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h6 class="fw-bold mb-3">Newsletter</h6>
                <p class="small">Recevez nos offres exclusives</p>
                <form class="d-flex" onsubmit="alert('Fonctionnalité à venir !'); return false;">
                    <input type="email" class="form-control form-control-sm me-2" placeholder="Votre email">
                    <button class="btn btn-primary btn-sm" type="submit">S'abonner</button>
                </form>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center py-3 small">
            <p class="mb-0">&copy; 2026 ShopEase - Tous droits réservés | 
               <a href="#" class="text-white-50">Conditions générales</a> | 
               <a href="#" class="text-white-50">Politique de confidentialité</a>
            </p>
        </div>
    </div>
</footer>