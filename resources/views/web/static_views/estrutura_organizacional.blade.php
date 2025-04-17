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
                <div class="col-lg-12">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('images/assets/img/team/RosangelaOSilva.png') }}"
                             alt="..." />
                        <h4>Rosângela O. Silva</h4>
                        <p class="text-muted">Presidente</p>
                        <p class="text-muted">Socióloga (FESPSP), Assistente Social (Universidade Braz Cubas) - CRESS 61.689, Servidora Pública da área da saúde.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('images/assets/img/team/paola.jpg') }}"
                             alt="..." />
                        <h4>Paola Falceta</h4>
                        <p class="text-muted">Vice-presidente de saúde e fundadora da Avico Brasil</p>
                        <p class="text-muted">Assistente social, Defensora Direitos Humanos com atuação na área da saúde e educação, e Conselheira Estadual de Saúde – CES/RS.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                             src="{{ asset('images/assets/img/team/denise.jpg') }}" alt="..." />
                        <h4>Denise Muniz</h4>
                        <p class="text-muted">Vice-Presidente Administrativo-Financeiro</p>
                        <p class="text-muted">Fisioterapeuta, com atuação em Traumato-Ortopedia e Especialização em FisioUrogineco.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                             src="{{ asset('images/assets/img/team/gutemberg.jpg') }}" alt="..." />
                        <h4>Gutenberg Alves Fortaleza Teixeira</h4>
                        <p class="text-muted">Vice-Presidente Jurídico</p>
                        <p class="text-muted">Advogado, especialista em Direito Internacional Público e Relações Internacionais (Léon – ULE/Espanha), Docente do curso de Direito da FAVALE.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                             src="{{ asset('images/assets/img/team/luciana.jpg') }}" alt="..." />
                        <h4>Luciana Faraco de Carolis</h4>
                        <p class="text-muted">Vice-Presidente de Assistência Social e Previdência</p>
                        <p class="text-muted">Advogada, com atuação nas áreas de Direito de Família e Sucessões, Cível e Criminal.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h4>Patrícia Teixeira</h4>
                    <p class="large text-muted">Secretária-Geral</p>
                    <br><br>
                    <h4 class="section-subheading text-muted mb-4">Conselho Fiscal</h4>
                    <h4>Bruno da Rosa Lumertz, Gabriela Moraes dos Santos e Nicolas Alcântara Rocha</h4>
                    <p class="large text-muted">Titulares</p>
                    <h4>Carolina Tavares Oliveira Borges, Luiz Fernando Valadares Flores e Núria Debertolis de Motta</h4>
                    <p class="large text-muted">Suplentes</p>
                </div>
            </div>
        </div>
    </section>
@endsection
