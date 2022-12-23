@extends('layouts.app')
@section('title', 'Avico Brasil - Associação de Vítimas e Familiares de Vítimas da Covid-19')
@section('content')
    <header class="masthead">
        <div class="container">
            @if (session('success'))
                @include(session('success'))
            @endif
            <div class="masthead-heading text-uppercase">AVICO</div>
            <div class="masthead-subheading">Associação de Vítimas e Familiares de Vítimas da Covid-19</div>
            <a class="btn btn-primary btn-xl text-uppercase mb-3" href="/inscricao">Associe-se a AVICO</a>
            <br>
            <a class="btn btn-primary btn-xl text-uppercase" href="/doacoes">Faça sua Doação</a>
        </div>
    </header>
    <!-- Cards Noticias LG-->
    <section class="page-section" id="noticias">
        <div class="container px-lg-5">

            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item active">

                        <div class="col-md-4 px-3" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top" src="images\assets\img\noticias\Infome10.png"
                                    alt="Imagem de um paciente em tratamento e uma profissional de saúde">
                                <div class="card-body">
                                    <p class="datanoticia">Postado em 10/06/2022</p>
                                    <p class="card-text altura-linha"><b>Covid longa é tema do décimo informe da Rede
                                            Trabalhadores & Covid-19 do Cesteh-Fiocruz</b>
                                    </p>
                                    <a class="btn btn-primary btn-sm"
                                        href="/covid-longa-e-tema-do-decimo-informe-da-rede-trabalhadores-covid-19-do-cesteh-fiocruz">Leia
                                        Mais</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-3 lgcards" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top" src="images\assets\img\noticias\emergencia.jpeg"
                                    alt="Imagem de um paciente em tratamento e uma profissional de saúde">
                                <div class="card-body">
                                    <p class="datanoticia">Postado em 02/06/2022</p>
                                    <p class="card-text altura-linha"><b>Mesmo com o fim da situação de emergência
                                            sanitária, parte da população ainda sofre com sequelas da covid-19</b></p>
                                    <a class="btn btn-primary" btn-sm
                                        href="/mesmo-com-o-fim-da-situacao-de-emergencia-sanitaria-parte-da-populacao-ainda-sofre-com-sequelas-da-covid-19">Leia
                                        Mais</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-3 lgcards" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top" src="images\assets\img\noticias\BDF1.png"
                                    alt="Imagem de um paciente em tratamento e uma profissional de saúde">
                                <div class="card-body">
                                    <p class="datanoticia">Postado em 01/06/2022</p>
                                    <p class="card-text altura-linha"><b>Audiência debate a situação das sequelas das
                                            vítimas da covid no Rio Grande do Sul</b></p>
                                    <a class="btn btn-primary btn-sm"
                                        href="/audiencia-debate-a-situacao-das-sequelas-das-vitimas-da-covid-no-rio-grande-do-sul">Leia
                                        Mais</a>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!--/.First slide-->

                    <!--Second slide-->
                    <div class="carousel-item">

                        <div class="col-md-4 px-3" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top" src="images\assets\img\noticias\ascon-cns.png"
                                    alt="Imagem de um paciente em tratamento e uma profissional de saúde">
                                <div class="card-body">
                                    <p class="datanoticia">Postado em 27/05/2022</p>
                                    <p class="card-text altura-linha"><b>“Estamos há quase três anos com a Covid-19 no
                                            Brasil e ainda nada foi feito”, critica presidenta da Avico, no Pleno do CNS,
                                            sobre familiares e vítimas da doença<b></p>
                                    <a class="btn btn-primary btn-sm"
                                        href="/estamos-ha-quase-tres-anos-com-a-covid-19-no-brasil-e-ainda-nada-foi-feito-critica-presidenta-da-avico-no-pleno-do-cns-sobre-familiares-e-vitimas-da-doenca">Leia
                                        Mais</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-3 lgcards" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top" src="images\assets\img\noticias\BdF.png"
                                    alt="Imagem de um paciente em tratamento e uma profissional de saúde">
                                <div class="card-body">
                                    <p class="datanoticia">Postado em 27/05/2022</p>
                                    <p class="card-text altura-linha"><b>Audiências públicas debaterão a situação das
                                            sequelas das vítimas da covid no estado.</b></p>
                                    <a class="btn btn-primary btn-sm"
                                        href="/audiencias-publicas-debaterao-a-situacao-das-sequelas-das-vitimas-da-covid-no-estado">Leia
                                        Mais</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-3 lgcards" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top" src="images\assets\img\noticias\assembleia.jpeg"
                                    alt="Imagem de um paciente em tratamento e uma profissional de saúde">
                                <div class="card-body">
                                    <p class="datanoticia ">Postado em 27/04/2022</p>
                                    <p class="card-text altura-linha"><b>Assembleia Legislativa instala Frente Parlamentar
                                            em Defesa das Vítimas da Covid-19.</b></p>
                                    <a class="btn btn-primary btn-sm"
                                        href="/assembleia-legislativa-instala-frente-parlamentar-em-defesa-das-vitimas-da-covid-19">Leia
                                        Mais</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/.Second slide-->



                </div>
                <!--/.Slides-->
                <!--Indicators-->
                <ol class="carousel-indicators pt-3">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="1"></li>

                </ol>
                <!--/.Indicators-->
                <!--Controls-->
                <!--<div class="text-center">
                                                                                                                                  <div class="controls-top">
                                                                                                                                  <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                                                                                                                                  <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <!--/.Controls-->


                <!--/.Carousel Wrapper-->

            </div>
        </div>
    </section>

    <!-- Fim Cards Noticias LG-->





    </section>
    <!--<section class="page-section" id="services">
                                                                                                                                    <div class="container">
                                                                                                                                        <div class="text-center">
                                                                                                                                            <h2 class="section-heading text-uppercase">Sobre Nós</h2>
                                                                                                                                            <h3 class="section-subheading text-muted">A Associação de Vítimas e Familiares de Vítimas da Covid-19 –
                                                                                                                                                AVICO Brasil foi fundada em 08 de abril de 2021, em pleno colapso da saúde pública na cidade de Porto
                                                                                                                                                Alegre/RS, partir da indignação de Gustavo Bernardes (Advogado) e Paola Falceta (Assistente Social) com
                                                                                                                                                a ineficiência e negligência do Estado diante das múltiplas consequências da pandemia de covid-19 na
                                                                                                                                                vida dos brasileiros. Gustavo foi internado (e entubado) no final de 2020 para tratamento da doença e
                                                                                                                                                sofreu com as graves sequelas oriundas da infecção. Paola foi infectada enquanto cuidava de sua mãe,
                                                                                                                                                hospitalizada primeiramente para uma cirurgia de emergência, mas que também se infectou e faleceu da
                                                                                                                                                doença em março de 2021. Por terem atuado juntos na defesa de Direitos Humanos de outro coletivo da
                                                                                                                                                sociedade civil, sempre acreditaram que, diante da inação (intencional ou não) do Estado, somente a
                                                                                                                                                potência da mobilização social e o enfrentamento comunitário poderiam minimizar os diferentes impactos
                                                                                                                                                da pandemia no Brasil.</h3>
                                                                                                                                            <h3 class="section-subheading text-muted">Nasce, dessa força conjunta, um coletivo social que luta por
                                                                                                                                                justiça e memória às vítimas fatais e também pela garantia e acesso aos Direitos Humanos constitucionais
                                                                                                                                                dos sobreviventes da covid-19. Ainda que estejamos constituídos legalmente (com CNPJ), não somos uma
                                                                                                                                                empresa ou escritório de advocacia, não temos sede ou funcionários. Somos todos trabalhadores que
                                                                                                                                                paralelamente oferecem seu apoio e conhecimento solidária e coletivamente à outros como nós. Decidimos
                                                                                                                                                não ficar parados assistindo o Estado brasileiro contribuindo com o adoecimento e morte de nosso povo
                                                                                                                                                pela covid-19. E para isso, é fundamental que ocupemos os diversos espaços políticos e sociais da nossa
                                                                                                                                                sociedade, fazendo com que enxerguem e ouçam as nossas histórias. Somos vidas e amores de alguém e nunca
                                                                                                                                                nos reduzirão a números! É na luta coletiva que somos mais fortes!</h3>

                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </section>-->


    <!-- Video AVICO-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container px-5">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Para conhecer melhor a nossa história</h2>
                <iframe width="100%" height="700rem" src="https://www.youtube.com/embed/iphbaAw50b8"
                    title="FAÇA DIFERENÇA - AJUDA VíTIMAS DA COVID" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Sobre Nós</h2>
                <h3 class="section-subheading text-muted">Uma breve história da AVICO</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image">
                        <h4>08 de <br />abril<br /> de 2021</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/1.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>08 de abril de 2021</h4>-->
                            <h5 class="subheading">Fundação da Avico</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>09 de <br />junho<br /> de 2021</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/2.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>09 de junho de 2021</h4>-->
                            <h5 class="subheading">Representação criminal contra Bolsonaro na PGR</h4>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image">
                        <h4>22 de <br />junho<br /> de 2021</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/3.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>22 de junho de 2021</h4>-->
                            <h5 class="subheading">Ato em homenagem a 500 mil vitimas da covid-19</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>15 de <br />outubro<br /> de 2021</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/4.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>15 de outubro de 2021</h4>-->
                            <h5 class="subheading">Ato em defesa a 602 mil vítimas da Covid-19 em frente ao Congresso
                                Nacional</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image">
                        <h4>05 de <br />novembro<br /> de 2021</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/3.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>05 novembro de 2021</h4>-->
                            <h5 class="subheading">AVICO integra comitê estadual em defesa das vítimas da Covid-19 do
                                Conselho Estadual de Saúde - RS </h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>19 de <br />dezembro<br /> de 2021</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/4.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>19 de dezembro de 2021</h4>-->
                            <h5 class="subheading">MPF ajuíza ação civil pública contra União em defesa das vítimas da
                                Covid-19</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image">
                        <h4>12 de <br />março <br />de 2022</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/3.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>12 de março de 2022</h4>-->
                            <h5 class="subheading">AVICO Brasil faz atos em homenagem ao dia das vítimas da Covid-19 em
                                sete capitais</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>08 de<br /> abril <br />de 2022</h4>
                        <!--<img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/4.jpg') }}" alt="..." />-->
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>08 de abril de 2022</h4>-->
                            <h5 class="subheading">AVICO ajuíza queixa-crime contra Bolsonaro no STF</h5>
                        </div>
                    </div>
                </li>
                <!--<li>
                                                                                                                                                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('images/assets/img/about/3.jpg') }}" alt="..." /></div>
                                                                                                                                                    <div class="timeline-panel">
                                                                                                                                                        <div class="timeline-heading">
                                                                                                                                                            <h4>27 de abril de 2022</h4>
                                                                                                                                                            <h5 class="subheading">AVICO integra frente parlamentar estadual em defesa das vítimas de Covid-19</h5>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </li>-->
                <li class="timeline-panel">
                    <div class="timeline-image">

                        <h4>
                            27 de
                            <br />
                            abril
                            <br />
                            de 2022
                        </h4>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <!--<h4>27 de abril de 2022</h4>-->
                            <h5 class="subheading">AVICO integra frente parlamentar estadual em defesa das vítimas de
                                Covid-19</h5>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Faça
                            <br />
                            Parte da
                            <br />
                            AVICO!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
