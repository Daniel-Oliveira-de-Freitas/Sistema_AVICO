@extends('layouts.app')
@section('title',  $noticia->titulo)
@section('content')
    <section class="container container-text sem_">
        <div class="d-flex justify-content-end align-items-center gap-2 mb-3">
            <a
                href="{{ route('listar.noticias') }}"
                class="btn btn-info btn-sm"
                role="button"
            >
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
            @role('admin')
            <a href="{{ route('atualizar.noticia', $noticia->id) }}" class="btn btn-primary btn-sm">
                <i class="fa fa-edit"></i> Editar
            </a>
            <form
                method="POST"
                action="{{ route('remover.noticia', $noticia->id) }}"
                class="d-inline"
                onsubmit="return confirm('Tem certeza que deseja excluir esta notícia? Esta ação não pode ser desfeita.');"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Excluir
                </button>
            </form>
            @endrole
        </div>
        <div class="pb-3 text-muted small">
            Por {!! $noticia->user->person?->nome_completo !!} em
            {{ $noticia->created_at?->format('d/m/Y H:i') }}
        </div>
        <div class="row">
            <div class="col-lg-9 noticia">
                <h3 class="mb-3">{{ $noticia->titulo }}</h3>

                <div class="row pt-3">
                    <img class="img-fluid rounded" src="{!! asset($noticia->caminho_imagem) !!}" alt="{{ $noticia->titulo }}">
                </div>

                <div class="row pt-3">
                    {!! $noticia->conteudo !!}
                </div>
            </div>

            <livewire:show-more-notices-component/>
        </div>
    </section>
@endsection
