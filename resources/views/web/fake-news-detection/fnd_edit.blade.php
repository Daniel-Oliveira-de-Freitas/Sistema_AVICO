@extends('layouts.app')

@section('title', 'Fake News Detection - Edit')

@section('content')
    <section class="page-section">
        <div class="col-md-4 col-md-offset-4 container">
            <h2 class="text-center mb-4">Editar Pesquisa</h2>
            @include('messages.messages')
            <form  method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label class="form-label" for="noticiasInput">Digite o Link da Página de Noticias</label>
                    <input class="form-control" value="{{$jobFakeNewsDetection->links}}" name="links" id="noticiasInput" type="text"
                           placeholder="Ex: https://g1.globo.com" required autofocus>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label" for="frequenciaInput">Digite o numero de dias para a frequência de varredura</label>
                    <input class="form-control" name="cron" id="frequenciaInput" type="number"
                           placeholder="Ex: 4" required autofocus>
                </div>
                <div class="form-group mb-4">
                    <label class="form-label" for="emailInput">Digite o/os email/s que deseja receber os resultados</label>
                    <input class="form-control" name="emails" id="emailInput" type="email"
                           placeholder="Digite o/os email/s" required autofocus>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <a href="{{ route('fake-news-detection.list') }}" class="btn btn-success me-3">Voltar</a>
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </section>
@endsection