@extends('layouts.app')
@section('title', 'Avico Brasil - Associação de Vítimas e Familiares de Vítimas da Covid-19')
@section('content')
    <!-- Imagem Principal-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">AVICO</div>
            <div class="masthead-subheading">Associação de Vítimas e Familiares de Vítimas da Covid-19</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="/inscricao">Associe-se a AVICO</a>
        </div>
    </header>
   <!-- Cards Noticias-->
   <section class="page-section" id="noticias">
        <div class="container px-5">
             <div class="row">
                <div class="col-md-4 col-sm-12  pb-5">
                <div class="card">
                        <img src="images\assets\img\cards-noticias.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        </div>
                </div>          
                <div class="col-md-4 col-sm-12 pb-5"> 
                <div class="card">
                        <img src="images\assets\img\cards-noticias.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        </div>
                </div>  
                <div class="col-md-4 col-sm-12 pb-5"> 
                <div class="card">
                            <img src="images\assets\img\cards-noticias.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            </div>
                </div>  
                

            </div>
            </div>
        </div>
    </section>

   <!-- Fim Cards Noticias-->
   
    </section>
    <section class="page-section" id="services">
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
    </section>


    <!-- Video AVICO-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
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
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('images/assets/img/about/1.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>08 de abril de 2021</h4>
                                <h4 class="subheading">Fundação</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">em pleno colapso da saúde pública na cidade de Porto Alegre/RS, partir da indignação de Gustavo Bernardes (Advogado) e Paola Falceta (Assistente Social) com a ineficiência e negligência do Estado diante das múltiplas consequências da pandemia de covid-19 na vida dos brasileiros.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('images/assets/img/about/2.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Final de 2020</h4>
                                <h4 class="subheading">Gustavo foi internado</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">(e entubado) para tratamento da doença e sofreu com as graves sequelas oriundas da infecção. Paola foi infectada enquanto cuidava de sua mãe, hospitalizada primeiramente para uma cirurgia de emergência, mas que também se infectou e faleceu da doença em março de 2021.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('images/assets/img/about/3.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2015</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Por terem atuado juntos na defesa de Direitos Humanos de outro coletivo da sociedade civil, sempre acreditaram que, diante da inação (intencional ou não) do Estado, somente a potência da mobilização social e o enfrentamento comunitário poderiam minimizar os diferentes impactos da pandemia no Brasil.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('images/assets/img/about/4.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2020</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Nasce, dessa força conjunta, um coletivo social que luta por justiça e memória às vítimas fatais e também pela garantia e acesso aos Direitos Humanos constitucionais dos sobreviventes da covid-19. Ainda que estejamos constituídos legalmente (com CNPJ), não somos uma empresa ou escritório de advocacia, não temos sede ou funcionários.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('images/assets/img/about/3.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>DATA XX/XX/XX</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Somos todos trabalhadores que paralelamente oferecem seu apoio e conhecimento solidária e coletivamente à outros como nós. Decidimos não ficar parados assistindo o Estado brasileiro contribuindo com o adoecimento e morte de nosso povo pela covid-19.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('images/assets/img/about/4.jpg')}}" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>OUTRA DATA XX/XX/XXXX</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">E para isso, é fundamental que  ocupemos os diversos espaços políticos e sociais da nossa sociedade, fazendo com que enxerguem e ouçam as nossas histórias. Somos vidas e amores de alguém e nunca nos reduzirão a números! É na luta coletiva que somos mais fortes!</p></div>
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
