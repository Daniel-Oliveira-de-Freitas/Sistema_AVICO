@extends('layouts.app')
@section('title', 'Login - Avico Brasil')
@section('content')
    <section class="page-section">
        <div class="col-md-4 col-md-offset-4 container">
            <h2 class="text-center mb-4">Criar Pesquisa</h2>
            @include('messages.messages')
            <form action="{{ route('fake-news-detection.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label class="form-label" for="noticiasInput">Digite o Link da Página de Noticias</label>
                    <input class="form-control" name="link" id="noticiasInput" type="text"
                           placeholder="Ex: https://g1.globo.com" required autofocus>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label" for="frequenciaInput">Selecione o intervalo de tempo para a frequência de varredura</label>
                    <select class="form-control" name="frequencia" id="frequenciaInput" type="number" required autofocus>
                        <option value="DIARIO">Diário</option>
                        <option value="SEMANAL">Semanal</option>
                        <option value="MENSAL">Mensal</option>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label" for="emailInput">Digite o/os email/s que deseja receber os resultados</label>
                    <input class="form-control" name="emails" id="emailInput" type="email"
                           placeholder="Digite o/os email/s" required autofocus>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('fake-news-detection.list') }}" class="btn btn-success me-3">Voltar</a>
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
