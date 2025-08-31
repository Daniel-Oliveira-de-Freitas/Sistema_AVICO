@extends('layouts.app')
@section('title', 'Cadastro de Noticia - AVICO')

@section('content')
    <section class="container form_body rows">
        @include('messages.messages')

        <form action="{{ route('atualizar.noticia.store', $noticia->id) }}" method="POST" enctype="multipart/form-data"
              class="mb-5">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="form-group mb-4">
                        <label for="titulo">Título</label>
                        <input
                            type="text"
                            class="form-control"
                            id="titulo"
                            name="title"
                            value="{{ $noticia->titulo }}"
                            placeholder="Adicione o título da notícia"
                            required
                        >
                    </div>
                    <div class="form-group mb-4">
                        <label for="editor1">Notícia</label>
                        <input
                            id="editor1"
                            type="hidden"
                            name="body"
                            value="{{ $noticia->conteudo }}"
                        >
                        <trix-editor input="editor1"></trix-editor>
                    </div>
                    <div class="form-group mb-4">
                        <label for="userfile">Carregar imagem</label>
                        <input
                            id="userfile"
                            type="file"
                            name="userfile"
                            accept="image/jpeg,image/png"
                            class="form-control-file"
                        >
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('listar.noticias') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fa fa-times"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-save"></i> Salvar edição
                        </button>
                    </div>
                    <input type="hidden" name="redirect_to" value="{{ route('listar.noticias') }}">
                </div>
            </div>
        </form>
    </section>
@endsection
