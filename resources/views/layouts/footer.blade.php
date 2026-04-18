<footer class="bg-dark text-white pt-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3"><i class="fas fa-store"></i> ShopEase</h5>
                <p>Votre boutique en ligne de confiance depuis 2024. Des milliers de produits à prix imbattables.</p>
                <div class="mt-3">
                    <a href="https://www.facebook.com" target="_blank" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="https://www.instagram.com" target="_blank" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="https://www.twitter.com" target="_blank" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="https://www.linkedin.com" target="_blank" class="text-white"><i class="fab fa-linkedin fa-lg"></i></a>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold mb-3">Contact</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> +216 71 23 45 67</li>
                    <li class="mb-2"><i class="fab fa-whatsapp me-2"></i> +216 98 76 54 32</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> contact@shopease.tn</li>
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Tunis, Tunisie</li>
                </ul>
            </div>
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold mb-3">Aide</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white-50 text-decoration-none small">Accueil</a></li>
                    <li><a href="{{ route('pages.contact') }}" class="text-white-50 text-decoration-none small">Contact</a></li>
                    <li><a href="#" class="text-white-50 text-decoration-none small" onclick="alert('Livraison gratuite dès 50 TND'); return false;">Livraison</a></li>
                    <li><a href="{{ route('pages.returns') }}" class="text-white-50 text-decoration-none small">Retours</a></li>
                    <li><a href="{{ route('pages.faq') }}" class="text-white-50 text-decoration-none small">FAQ</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
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
        </div>
        <hr class="border-secondary">
        <div class="text-center py-3 small">
            <p class="mb-0">&copy; 2026 ShopEase - Tous droits réservés | 
               <a href="#" class="text-white-50" onclick="alert('Conditions générales de vente - À venir'); return false;">Conditions générales</a> | 
               <a href="#" class="text-white-50" onclick="alert('Politique de confidentialité - À venir'); return false;">Politique de confidentialité</a>
            </p>
        </div>
    </div>
</footer>