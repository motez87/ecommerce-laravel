<header>
    <!-- Top bar -->
    <div class="bg-dark text-white py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <small><i class="fas fa-truck"></i> Livraison gratuite dès 50 TND</small>
                    <small class="ms-3"><i class="fas fa-undo-alt"></i> Retour sous 14 jours</small>
                </div>
                <div class="col-md-6 text-end">
                    <small><i class="fas fa-phone"></i> Service client: +33 1 23 45 67 89</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Main navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="{{ route('home') }}" style="color: #667eea;">
                <i class="fas fa-store"></i> ShopEase
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Barre de recherche avec AJAX + Bouton (petit) -->
                <form class="d-flex mx-auto w-50" id="search-form" method="GET" action="{{ route('home') }}">
                    <div class="position-relative flex-grow-1">
                        <input type="text" name="search" id="header-search" class="form-control rounded-pill" placeholder="Rechercher un produit...">
                        <div id="header-search-results" class="position-absolute w-100 bg-white shadow-lg rounded-3 mt-1" style="display: none; z-index: 1000; max-height: 400px; overflow-y: auto;">
                        </div>
                    </div>
                    <button class="btn btn-primary rounded-pill ms-2" type="submit" id="search-button" style="padding: 6px 15px; font-size: 14px;">
                        <i class="fas fa-search"></i> Rechercher
                    </button>
                </form>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a>
                    </li>
                    
                    <!-- Dashboard Admin (visible uniquement pour l'admin) -->
                    @if(Auth::check() && Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}" style="color: #667eea; font-weight: bold;">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    @endif
                    
                    <!-- Panier et Commandes : cachés pour l'admin -->
                    @if(!Auth::check() || Auth::user()->role != 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> Panier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-box"></i> Commandes</a>
                    </li>
                    @endif
                    
                    <!-- Bouton Admin séparé -->
                    <li class="nav-item">
                        <a class="btn btn-outline-danger ms-2" href="{{ route('admin.login') }}">
                            <i class="fas fa-user-shield"></i> Admin
                        </a>
                    </li>
                    
                    @guest
                        <li class="nav-item"><a class="btn btn-outline-primary ms-2" href="{{ route('login') }}">Connexion</a></li>
                        <li class="nav-item"><a class="btn btn-primary ms-2" href="{{ route('register') }}">Inscription</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=667eea&color=fff" class="rounded-circle me-2" width="35" height="35">
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <!-- Ligne "Mes commandes" SUPPRIMÉE -->
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fas fa-user"></i> Mon profil</a></li>
                                
                                @if(Auth::user()->role == 'admin')
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a></li>
                                @endif
                                
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Categories bar -->
    <div class="bg-light border-bottom">
        <div class="container">
            <div class="d-flex justify-content-center flex-wrap py-2">
                @php
                    $categories = App\Models\Category::all();
                @endphp
                @foreach($categories as $category)
                <a href="{{ route('categories.show', $category->slug) }}" class="text-dark text-decoration-none px-3 py-2 small fw-semibold">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let searchTimeout;
    
    // Recherche AJAX en temps réel (suggestions)
    $('#header-search').on('keyup', function() {
        let query = $(this).val();
        
        clearTimeout(searchTimeout);
        
        if (query.length >= 2) {
            searchTimeout = setTimeout(function() {
                $.ajax({
                    url: '{{ route("api.products.search") }}',
                    method: 'GET',
                    data: { q: query },
                    success: function(data) {
                        let results = $('#header-search-results');
                        results.empty();
                        
                        if (data.length > 0) {
                            $.each(data, function(key, product) {
                                let price = parseFloat(product.price).toLocaleString('fr-TN', {minimumFractionDigits: 3, maximumFractionDigits: 3});
                                results.append(`
                                    <a href="/products/${product.id}" class="text-decoration-none">
                                        <div class="d-flex align-items-center p-3 border-bottom hover-bg">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-dark">${product.title}</h6>
                                                <small class="text-muted">${product.category ? product.category.name : ''}</small>
                                                <div class="text-primary fw-bold">${price} TND</div>
                                            </div>
                                        </div>
                                    </a>
                                `);
                            });
                            results.show();
                        } else {
                            results.html('<div class="p-3 text-center text-muted">Aucun produit trouvé</div>');
                            results.show();
                        }
                    }
                });
            }, 300);
        } else if (query.length === 0) {
            $('#header-search-results').hide();
        }
    });
    
    // Cacher les résultats quand on clique ailleurs
    $(document).click(function(e) {
        if (!$(e.target).closest('#header-search, #header-search-results').length) {
            $('#header-search-results').hide();
        }
    });
});

// Style pour le hover
$('head').append(`
    <style>
        .hover-bg:hover {
            background-color: #f8f9fa;
        }
        #header-search-results {
            border: 1px solid #ddd;
            border-radius: 8px;
        }
    </style>
`);
</script>