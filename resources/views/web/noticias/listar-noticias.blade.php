@extends('layouts.app')
@section('title', 'Noticias')

@section('content')
    <section class="container container-text sem_ rmb">
        <div class="text-center pb-3">
            <h3 class="section-heading text-uppercase">Notícias</h3>
        </div>
        @include('messages.messages')
        @forelse ($noticias as $noticia)
            <div class="row border-top  pt-3">
                <div class="col-lg-4"><img class="img-fluid" src="{{ asset($noticia->caminho_imagem) }}" alt=""></div>
                <div class="col-lg-8 rpttitle">
                    <div class="sem_cor"><a href="{{ route('visualizar.noticia', $noticia->id) }}">
                            <h5>{{ $noticia->titulo }}</h5></a>
                    </div>
                    <p>{!! Str::limit($noticia->conteudo, 250) !!}</p>
                    <div class="float-end pe-2 pb-4"><a class="btn btn-primary btn-sm"
                            href="{{ route('visualizar.noticia', $noticia->id) }}">Leia Mais</a>
                    </div>
                </div>
            </div>
        @empty
            <h2 class="text-center">Nenhuma notícia publicada</h2>
        @endforelse
        <div class="container">
            {{ $noticias->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
