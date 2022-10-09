@extends('layouts.app')

@section('content')
    <section>
        <div class="bg-principal text-white flex  justify-content h-screen">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="container">
                    <label class="name">Nome</label>
                    <input type="text"name="name" required>
                </div>

                <div class="container ">
                    <label class="username"><b>Username</b></label>
                    <input type="text" name="username" required>
                </div>

                <div class="container ">
                    <label class="email"><b>Email</b></label>
                    <input type="email" name="email" required>
                </div>

                <div class="container">
                    <div class="container ">
                        <label class="senha" for="psw"><b>Senha</b></label>
                        <input type="password" name="password" required>
                    </div>
                </div>
                <div>
                    @foreach (\App\Enums\UserTypes::USER_TYPES as $key => $value)
                        <br>
                        <input class="tipo form-check-input" type="checkbox" name="tipo" id="{{ $value }}"
                            value="{{ $value }}" data-parsley-required data-parsley-mincheck="1"
                            data-parsley-required-message="Você deve selecionar uma opção">
                        <label class="form-check-label" for="{{ $value }}"> {{ $value }}</label>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>

            </form>
        </div>
    </section>
@endsection
