@extends('layouts.app')
@section('title', 'Noticias')

@section('content')
    <section class="container container-text sem_ rmb">
        <div class="text-center pb-3">
            <h3 class="section-heading text-uppercase">Notícias</h3>
        </div>
        @include('messages.messages')
        @forelse ($noticias as $noticia)
            <div class="row border-top py-3 my-3">
                <div class="col-lg-4">
                    <img class="img-fluid" src="{{ asset($noticia->caminho_imagem) }}" alt="">
                </div>
                <div class="col-lg-8 rpttitle d-flex flex-column">
                    <a href="{{ route('visualizar.noticia', $noticia->id) }}" class="sem_cor">
                        <h5 class="mb-2">{{ $noticia->titulo }}</h5>
                    </a>
                    <p class="mb-3">{!! Str::limit($noticia->conteudo, 250) !!}</p>
                    <div class="mt-auto d-flex justify-content-end">
                        <a class="btn btn-primary btn-sm" href="{{ route('visualizar.noticia', $noticia->id) }}">Leia Mais</a>
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
