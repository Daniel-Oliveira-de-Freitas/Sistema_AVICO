@extends('layouts.app')
@section('content')
<section class="container" >
    <div class="col-md-4 col-md-offset-4">
        <br><br><br><br><br>
            <h1 class="text-center">Login</h1>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Digite seu Email" required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" placeholder="Digite sua Senha" required autofocus>
            </div>
            <br>
            <button type="submit" class="btn btn-primary col-md-12 col-md-offset-12">Login</button>
        </div>
</section>
@endsection