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
                <form class="d-flex mx-auto w-50" action="#" method="GET">
                    <input class="form-control rounded-pill me-2" type="search" placeholder="Rechercher un produit..." aria-label="Search">
                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i> Panier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}"><i class="fas fa-box"></i> Commandes</a>
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
                                <li><a class="dropdown-item" href="{{ route('orders.index') }}"><i class="fas fa-box"></i> Mes commandes</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fas fa-user"></i> Mon profil</a></li>
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