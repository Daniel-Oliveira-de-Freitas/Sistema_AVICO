@extends('layouts.app')
@section('title', 'Cadastro de Noticia - AVICO')

@section('content')
    <section class="form_body container rows ">
        @if (session('success'))
            @include(session('success'))
        @endif
        <form action="{{ route('cria_noticia') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8 col-md-offset-8" style="position: absolute; left: 17%; ">
                <div class="form-group mb-4">
                    <label> Titulo</label>
                    <input type="text" class="form-control" name="title" placeholder="Adicione o Titulo da noticia">
                </div>
                <div class="form-group mb-4">

                    <label> Noticia </label>
                    <textarea id="editor1" class="form-control" name="body" placeholder="Adicione a noticia"></textarea>
                </div>

                <div class="form-group mb-4">
                    <label> Carregar Imagem </label>
                    <input type="file" name="userfile" size="50">

                    <button type="submit" class="btn btn-success col-md-2 mt-4" style="margin-left: 83%;">Salvar</button>
                </div>

            </div>
        </form>
    </section>
@endsection
