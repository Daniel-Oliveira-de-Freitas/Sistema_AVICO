@extends('layouts.app')
@section('title', 'Avico Brasil - Associação de Vítimas e Familiares de Vítimas da Covid-19')
@section('content')
    <header class="masthead">
        @include('messages.messages')
        <div class="container">
            <div class="masthead-heading text-uppercase">AVICO</div>
            <div class="masthead-subheading">Associação de Vítimas e Familiares de Vítimas da Covid-19</div>
            <a class="btn btn-primary btn-xl text-uppercase mb-3" href="{{ route('cadastro') }}">Associe-se a AVICO</a>
            <br>
            <a class="btn btn-primary btn-xl text-uppercase" href="/doacoes">Faça sua Doação</a>
        </div>
    </header>

    <section class="page-section" id="noticias">
        <div class="container px-lg-5">
            <livewire:notices-carousel/>
        </div>
    </section>

    <section class="page-section bg-light" id="portfolio">
        <div class="container px-5">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Para conhecer melhor a nossa história</h2>
                <iframe width="100%" height="700rem" src="https://www.youtube.com/embed/iphbaAw50b8"
                        title="FAÇA DIFERENÇA - AJUDA VíTIMAS DA COVID"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Sobre Nós</h2>
                <h3 class="section-subheading text-muted">Uma breve história da AVICO</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image">
                        <h4>08 de <br/>abril<br/> de 2021</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">Fundação da Avico</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>09 de <br/>junho<br/> de 2021</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">Representação criminal contra Bolsonaro na PGR</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image">
                        <h4>22 de <br/>junho<br/> de 2021</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">Ato em homenagem a 500 mil vitimas da covid-19</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>15 de <br/>outubro<br/> de 2021</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">Ato em defesa a 602 mil vítimas da Covid-19 em frente ao Congresso
                                Nacional</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image">
                        <h4>05 de <br/>novembro<br/> de 2021</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">AVICO integra comitê estadual em defesa das vítimas da Covid-19 do
                                Conselho Estadual de Saúde - RS </h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>19 de <br/>dezembro<br/> de 2021</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">MPF ajuíza ação civil pública contra União em defesa das vítimas da
                                Covid-19</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image">
                        <h4>12 de <br/>março <br/>de 2022</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">AVICO Brasil faz atos em homenagem ao dia das vítimas da Covid-19 em
                                sete capitais</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>08 de<br/> abril <br/>de 2022</h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">AVICO ajuíza queixa-crime contra Bolsonaro no STF</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-panel">
                    <div class="timeline-image">
                        <h4>
                            27 de
                            <br/>
                            abril
                            <br/>
                            de 2022
                        </h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="subheading">AVICO integra frente parlamentar estadual em defesa das vítimas de
                                Covid-19</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Faça
                            <br/>
                            Parte da
                            <br/>
                            AVICO!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
