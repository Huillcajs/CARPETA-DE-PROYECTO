@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('/auth/login.css') }}">
<div class="login-container">
    <div class="login-card">
        <h2 class="login-title">LOGIN</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo -->
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" name="email" placeholder="Usuario" required autofocus>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" placeholder="Contraseña" required>
            </div>

            <!-- Remember me -->
            <div class="form-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>

            <!-- Botón Iniciar Sesión -->
            <button type="submit" class="btn-login">Iniciar Sesión</button>

            <!-- Divider -->
            <div class="divider">
                <span>O ingresa con</span>
            </div>

            <!-- Botones sociales -->
            <div class="social-login">
                <a href="{{ url('login/google') }}" class="btn-social google">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google">
                </a>
                <a href="{{ url('login/github') }}" class="btn-social github">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg" alt="GitHub">
                </a>
            </div>

            <!-- Enlace de recuperación -->
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            @endif
        </form>
    </div>
</div>
@endsection

