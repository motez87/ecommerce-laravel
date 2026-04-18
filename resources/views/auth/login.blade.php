@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 80vh; display: flex; align-items: center;">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-white border-0 pt-4 text-center">
                    <h2 class="fw-bold" style="color: #667eea;">Connexion</h2>
                    <p class="text-muted">Bienvenue sur ShopEase</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="{{ route('password.request') }}" class="text-decoration-none small">Mot de passe oublié ?</a>
                        </div>

                        <div class="text-center mt-3">
                            <span class="text-muted">Pas encore de compte ?</span>
                            <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #667eea;">Inscription</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection