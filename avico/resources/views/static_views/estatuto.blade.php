@extends('layouts.app')
@section('title', 'Estatuto')
<style>
    button{
        padding-left: 0;
        padding-right: 0;
        padding-top: 0;
        padding-bottom: 0;
        border-top: 0;
        border-bottom: 0;
    }
</style>
@section('content')
<section class="page-section">
    <div class="container h-auto">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Conheça o Estatuto da Avico Brasil e caso tenha interesse, faça download em PDF.
            </h2>
            <embed src="{{ asset('images/assets/img/Estatuto-da-Avico.pdf')}}" width="100%" height="1000px" type="application/pdf">
        </div>
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Certidão de registro e ata de fundação da AVICO em 08/04/2021.
            </h2>
            <embed src="{{ asset('images/assets/img/Certidao-de-registro-e-Ata-de-Fundacao-da-Avico-1.pdf')}}" width="100%" height="1000px" type="application/pdf">
        </div>
    </div>
</section>
@endsection