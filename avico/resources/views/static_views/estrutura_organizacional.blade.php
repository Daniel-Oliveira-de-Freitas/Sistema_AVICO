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
                        <img class="mx-auto rounded-circle" src="{{ asset('images/assets/img/team/perfil-paola.jpeg') }}"
                            alt="..." />
                        <h4>Paola Falceta</h4>
                        <p class="text-muted">Presidente e fundadora da Avico Brasil</p>
                        <p class="text-muted">Assistente social, defensora e pós-graduanda em Direitos Humanos com atuação
                            na área da saúde e educação. Con-sultora na área de responsabilidade social e sustentabilidade.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset('images/assets/img/team/RosangelaOSilva.png') }}"
                            alt="..." />
                        <h4>Rosângela O. Silva</h4>
                        <p class="text-muted">Vice-presidente de saúde da Avico Brasil</p>
                        <p class="text-muted">Socióloga(FESPSP), Assistente Social(Universidade Braz Cubas) - CRESS 61.689,
                            Servidora Pública. Assiciada da Avico Brasil.</p>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="{{ asset('images/assets/img/team/PamelaCopettiGhisleni.png') }}" alt="..." />
                        <h4>Pâmela Copetti Ghisleni</h4>
                        <p class="text-muted">Vice-presidente júridica da Avico Brasil</p>
                        <p class="text-muted">Professora do Curso de Graduação em Direito da Faculdade CNEC Santo Ângelo,
                            Advogada(OAB/RS 100.497).</p>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="{{ asset('images/assets/img/team/VeraLuciadeMeloAragao.png') }}" alt="..." />
                        <h4>Vera Lúcia de Melo Aragão</h4>
                        <p class="text-muted">Vice-presidente de Assistência Social e Previdência da Avico Brasil</p>
                        <p class="text-muted">Professora, Pedagoga e Historiadora formada pela UERJ, com Pós graduação em
                            Gestão Escolar,
                            Supervisão e Orientação Escolar pelas faculdades Estácio de Sá - RJ e Cândido Mendes.</p>
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="team-member">
                        <img class="mx-auto rounded-circle"
                            src="{{ asset('images/assets/img/team/AcirJosePereiradeBastos.png') }}" alt="..." />
                        <h4>Acir José Pereira de Bastos</h4>
                        <p class="text-muted">Vice-presidente Administrativo Financeiro da Avico Brasil</p>
                        <p class="text-muted">Empresário, Formado em Administração pela UFPR, Pós-graduado em Auditoria e
                            MBA em Gestão Empresarioal pela FAE Business School Curitiba-PR.</p>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h4>Ivarlete de França</h4>
                    <p class="large text-muted">Diretora de Promoção da Saúde</p>
                    <h4>Gabriela Moraes</h4>
                    <p class="large text-muted">Diretora de Promoção da Assistência Social e Previdência</p>
                    <h4>Letícia Woida</h4>
                    <p class="large text-muted">Diretora-Jurídica</p>
                    <h4>Any Moraes</h4>
                    <p class="large text-muted">Secretária-Geral</p>
                    <h4>Nícolas Alcântara Rocha</h4>
                    <p class="large text-muted">Tesoureiro</p>
                    <br><br>
                    <h3 class="section-subheading text-muted">Conselho Fiscal:</h3>
                    <h4>Bruno da Rosa Lumertz, Gabriela Moraes dos Santos e Nicolas Alcântara Rocha</h4>
                    <p class="large text-muted">Titulares</p>
                    <h4>Carolina Tavares Oliveira Borges, Luiz Fernando Valadares Flores e Núria Debertolis de Motta e
                        Carolina</h4>
                    <p class="large text-muted">Suplentes</p>
                </div>
            </div>
        </div>
    </section>
@endsection
