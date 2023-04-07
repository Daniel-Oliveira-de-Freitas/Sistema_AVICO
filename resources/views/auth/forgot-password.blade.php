@extends('layouts.app')
@section('title', 'Esqueci minha senha')
@section('content')
    <section class="page-section container">
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            @if (session('status'))
                <x-alert alertType="success" dismissible='true' message="{{ session('status') }}" />
            @endif
            <h1 class="text-center">Recuperação de senha</h1>
            <div class="container-fluid d-md-grid gap-md-2 col-md-6 mx-auto bg-light shadow p-3 mb-5 bg-white rounded">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control mb-3" name="email" type="email">
                    <x-error-message errorName="email" />
                </div>
                <button class="btn btn-primary" type="submit">Enviar email para recuperação de senha</button>
            </div>
        </form>
    </section>
@endsection
