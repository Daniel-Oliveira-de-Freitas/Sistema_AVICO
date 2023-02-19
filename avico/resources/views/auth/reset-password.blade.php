@extends('layouts.app')
@section('title', 'Redefinição de senha')

@section('content')
    <section class="page-section">
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <h1 class="text-center">Redefinição de senha</h1>
            <div class="container-fluid d-md-grid gap-md-2 col-md-6 mx-auto bg-light shadow p-3 mb-5 bg-white rounded">
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control mb-3" type="email" name="email"
                        value="{{ old('email', $request->email) }}" readonly>
                    <x-error-message errorName="email" />
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Senha</label>
                    <input class="form-control mb-3" type="password" name="password">
                    <x-error-message errorName="password" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="password_confirmation">Confirmar senha</label>
                    <input class="form-control" type="password" name="password_confirmation">
                    <x-error-message errorName="password_confirmation" />
                </div>
                <button class="btn btn-primary" type="submit">Redefinir senha</button>
            </div>
        </form>
    </section>
@endsection
