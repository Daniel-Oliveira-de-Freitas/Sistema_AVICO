@extends('layouts.app')
@section('title', 'Esqueci minha senha')
@section('content')
<section class="container form-group">
    <form action="{{ route('password.email')}}" method="post">
        @csrf
        <label class="form-control-label" for="email">Email</label>
        <input class="form-control mb-3" name="email" type="email">
        <button type="submit" class="btn btn-primary">Enviar email</button>
    </form>
</section>
@endsection