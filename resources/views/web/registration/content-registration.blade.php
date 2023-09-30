@extends('layouts.app')
@section('title', 'Cadastro de Noticia - AVICO')

@section('content')
    <section class="form_body container rows ">
        @include('messages.messages')        
        <form action="{{ route('content.registration') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8 text-center mb-lg-4">
            <label for="paginas">Selecione a página desejada:</label>
            <select name="paginas" id="paginas" class="col-md-3" >
                <option value="sobre">Nossa Origem</option>
                <option value="sobre">Estrutura Organizacional</option>
                <option value="sobre">Núcleos Estaduais</option>
                <option value="sobre">Estatuto</option>
                <option value="sobre">Jurídico</option>
                <option value="perguntas">Apoio psicossocial</option>
                <option value="parceiros">Mobilização e Controle Social</option>
                <option value="nucleos">Parceiros</option>
                <option value="nucleos">Notícias</option>
                <option value="nucleos">Perguntas Frequentes</option>
                <option value="nucleos">Endereços Úteis</option>
            </select>
            </div>
            <div class="col-md-8 col-md-offset-8" style="left: 17%; ">
                <div class="form-group mb-4">
                    <label> Titulo*</label>
                    <input type="text" class="form-control" name="title" placeholder="Adicione o Titulo">
                    <x-error-message errorName="title"/>
                </div>
                <div class="form-group mb-4">
                    <label> Conteúdo* </label>
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
