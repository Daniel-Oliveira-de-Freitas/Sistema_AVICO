@extends('layouts.app')
@section('title', 'Login - Avico Brasil')
@section('content')
    <section class="page-section">
        <div class="col-md-4 col-md-offset-4 container">
            @include('messages.messages')
            <form action="{{ route('fake-news-detection.store') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="form-label" for="noticiasInput">Digite o Link da Página de Noticias</label>
                    <input class="form-control" name="noticias" id="noticiasInput" type="text"
                           placeholder="Ex: https://g1.globo.com" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="frequenciaInput">Digite o numero de dias para a frequência de varredura</label>
                    <input class="form-control" name="frequencia" id="frequenciaInput" type="number"
                           placeholder="Ex: 4" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="emailInput">Digite o/os email/s que deseja receber os resultados</label>
                    <input class="form-control" name="email" id="emailInput" type="email"
                           placeholder="Digite o/os email/s" required autofocus>
                </div>
                <div class="d-grid gap-2">
                    <button class="mt-2 mb-2 btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
