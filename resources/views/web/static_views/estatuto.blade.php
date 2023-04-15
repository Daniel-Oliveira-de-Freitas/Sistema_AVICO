@extends('layouts.app')
@section('title', 'Estatuto')
@section('content')
    <section class="page-section">
        <div class="container h-auto container-text">
            <div class="text-center mb-8 mt-8">
                <h3>Conheça o Estatuto da Avico Brasil e caso tenha interesse, faça download em PDF.</h3>
                    <embed src="{{ asset('images/assets/img/Estatuto-da-Avico.pdf') }}" width="100%" height="1000px"
                        type="application/pdf">
            </div>
            <hr>
            <div class="text-center mb-8 mt-8">
                <h3 >Certidão de registro e ata de fundação da AVICO em 08/04/2021.</h3>
                <embed src="{{ asset('images/assets/img/Certidao-de-registro-e-Ata-de-Fundacao-da-Avico-1.pdf') }}"
                    width="100%" height="1000px" type="application/pdf">
            </div>
        </div>
    </section>
@endsection
