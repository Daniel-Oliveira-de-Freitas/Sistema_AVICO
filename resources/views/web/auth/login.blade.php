@extends('layouts.app')
@section('title', 'Login - Avico Brasil')
@section('content')
    <section class="page-section">
        <div class="col-md-4 col-md-offset-4 container">
            @if ($errors->any())
                <x-alert alertType="danger" dismissible='true' message="Usuário ou senha incorretos" />
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label">Email</label>
                    <input class="form-control" name="email" id="passwordInput" type="email"
                        placeholder="Digite seu Email" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Senha</label>
                    <input class="form-control" name="password" id="passwordInput" type="password"
                        placeholder="Digite sua Senha" required autofocus>
                </div>
                <div class="d-grid gap-2">
                    <button class="mt-2 mb-2 btn btn-primary" type="submit">Login</button>
                </div>
                <a class="d-flex justify-content-center" href="/forgot-password">Esqueci minha senha</a>
            </form>
        </div>
    </section>
@endsection
