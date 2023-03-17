@extends('layouts.app')

@section('content')
    <section class="container-fluid form-group">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <label class="form-control-label" for="email">Email</label>
            <input class="form-control mb-3" type="email" name="email" value="{{old('email', $request -> email)}}" readonly>
            <label class="form-control-label" for="email">Senha</label>
            <input class="form-control mb-3" type="password" name="password">
            <label class="form-control-label" for="email">Confirmar senha</label>
            <input class="form-control mb-3" type="password" name="password_confirmation">
            <button type="submit" class="btn btn-primary">Redefinir senha</button>
        </form>
    </section>
@endsection
