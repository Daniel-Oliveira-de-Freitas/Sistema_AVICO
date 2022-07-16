@extends('layouts.app')
@section('title', 'Estrutura Organizacional')

@section('content')
<section class="page-section" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Estrutura Organizacional</h2>
            <h3 class="section-subheading text-muted">A gestão da AVICO Brasil é composta por:</h3>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('images/assets/img/team/perfil-paola.jpeg')}}" alt="..." />
                    <h4>Paola Falceta</h4>
                    <p class="text-muted">Presidente e fundadora da Avico Brasil</p>
                    <p class="text-muted">Assistente social, defensora e pós-graduanda em Direitos Humanos com atuação na área da saúde e educação. Con-sultora na área de responsabilidade social e sustentabilidade.</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="{{ asset('images/assets/img/team/perfil-bruno.jpeg')}}" alt="..." />
                    <h4>Bruno Da Rosa Lumertz</h4>
                    <p class="text-muted">Vice-presidente e fundador da Avico Brasil</p>
                    <p class="text-muted">Analista de políticas públicas, com formação em administração, é militante dos direitos humanos e da saúde pública.</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <!--<div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                    <h4>Larry Parker</h4>
                    <p class="text-muted">Lead Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>-->
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h4>Diretora de Promoção da Saúde:</h4>
                <p class="large text-muted">Ivarlete de França</p>
                <h4>Diretora de Promoção da Assistência Social e Previdência:</h4>
                <p class="large text-muted">Gabriela Moraes</p>
                <h4>Diretora-Jurídica:</h4>
                <p class="large text-muted">Letícia Woida</p>
                <h4>Secretária-Geral:</h4>
                <p class="large text-muted">Any Moraes</p>
                <h4>Tesoureiro:</h4>
                <p class="large text-muted">Nícolas Alcântara Rocha</p>
                
                <h2 class="padding-diretoria">Conselho Fiscal</h2>
                <h3>Titulares:</h3>
                <p class="large text-muted">Gilmar Loeblein Pauli, Luiz Fernando Valadares e Núria Debertolis da Motta</p>
                <h3>Suplentes:</h3>
                <p class="large text-muted">Carolina Tavares Oliveira Borges, Ivana Bernardes Lima e Maria Beatriz Mariante Brutto</p>
            </div>
        </div>
    </div>
</section>
@endsection