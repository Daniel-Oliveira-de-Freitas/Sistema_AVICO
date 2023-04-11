@extends('layouts.app')
@section('title', 'Cadastro de Noticia - AVICO')

@section('content')
    <section class="form_body container rows ">
        @if (session('success'))
            <x-alert alertType="warning" dismissible='true' message="Noticia cadastrada sucesso!"/>
        @endif
        <form action="{{ route('cria_noticia') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8 col-md-offset-8" style="left: 17%; ">
                <div class="form-group mb-4">
                    <label> Titulo*</label>
                    <input type="text" class="form-control" name="title" placeholder="Adicione o Titulo da noticia">
                    <x-error-message errorName="title"/>
                </div>
                <div class="form-group mb-4">
                    <label> Noticia* </label>
                    <input id="editor1" class="form-control" name="body" placeholder="Adicione a noticia"
                           type="hidden" name="content">
                    <trix-editor input="editor1"></trix-editor>
                    <x-error-message errorName="body"/>
                </div>

                <div class="form-group mb-4">
                    <label> Carregar Imagem </label>
                    <input type="file" name="userfile" accept="image/.jpg,.png,.jpeg">

                    <button type="submit" class="btn btn-success col-md-2 mt-4" style="margin-left: 83%;">Salvar
                    </button>
                </div>

            </div>
        </form>
    </section>

@endsection
