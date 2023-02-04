@extends('layouts.app')
@section('title', 'Noticia ler - AVICO')

@section('content')
    <section class="container container-text sem_">
        @role('admin')
            <div class="d-flex flex-row-reverse bd-highlight ">
                <form method="POST" action="{{ route('removeNoticia', $noticia->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                <form method="GET" action="{{ route('updateNoticia', $noticia->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        @endrole
        <div class="pb-3">Por <a href="estrutura">{{ !empty($noticia->user->person->nome_completo) }}</a>
            em
            {{ $noticia->created_at }}
        </div>

        <div class="row">
            <div class="col-lg-9 noticia">
                <h3>{{ $noticia->titulo }}</h3>
                <div class="row pt-3">
                    <img class="img-fluid" src="{{ asset($noticia->caminho_imagem) }}" alt="{{ $noticia->titulo }}">
                </div>
                <div class="row pt-3">
                    {!! $noticia->conteudo !!}
                </div>
            </div>
            <livewire:show-more-notices-component />
        </div>
    </section>
@endsection
