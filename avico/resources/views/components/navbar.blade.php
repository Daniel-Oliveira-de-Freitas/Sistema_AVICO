<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/"><img
                src="{{ asset('images/assets/img/cropped-LOGO-AVICO-2021-OK-PNG-1536x402.png') }}" alt="Logo AVICO" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                <div class="dropdown">
                    <button class="btn btn-secondary btn-nav-drop dropdown-toggle nav-item nav-link" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        A AVICO
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="/sobre">SOBRE NÓS</a></li>
                        <li><a class="dropdown-item" href="/estrutura">ESTRUTURA ORGANIZACIONAL</a></li>
                        <li><a class="dropdown-item" href="/estatuto">ESTATUTO</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary btn-nav-drop dropdown-toggle nav-item nav-link" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        EIXOS DE ATUAÇÃO
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/juridico">JURÍDICO</a>
                        <a class="dropdown-item" href="/apoio">APOIO PSICOSSOCIAL</a>
                        <a class="dropdown-item" href="/mobilizacao">MOBILIZAÇÃO E CONTROLE SOCIAL</a>
                    </div>
                </div>
                <li class="nav-item"><a class="nav-link" href="/noticias">Notícias</a></li>
                <li class="nav-item"><a class="nav-link" href="/nucleos">Núcleos Estaduais</a></li>
                <li class="nav-item"><a class="nav-link" href="/fale_conosco">Fale Conosco</a></li>
                <li class="nav-item"><a class="nav-link" href="/enderecos">Endereços Úteis</a></li>
                <li class="nav-item"><a class="nav-link" href="/perguntas">Perguntas Frequentes</a></li>
                @role('admin')
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-nav-drop dropdown-toggle nav-item nav-link" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ADMINISTRAÇÂO
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/listar">Listar Inscrições</a>
                            <a class="dropdown-item" href="/noticias/criaNoticia">Criar Noticia</a>
                        </div>

                    </div>
                @endrole
                @guest
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link" href="/logout">logout</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
