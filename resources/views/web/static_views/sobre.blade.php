@extends('layouts.app')
@section('title', 'Sobre Nós')

@section('content')
    <section class="page-section">
        <div class="container container-text">

            <h3>Sobre Nós</h3>
            <p>
                A Associação de Vítimas e Familiares de Vítimas da Covid-19 – AVICO Brasil foi fundada em 08 de abril de
                2021, em pleno colapso da saúde pública na cidade de Porto Alegre/RS, partir da indignação de Gustavo
                Bernardes (Advogado) e Paola Falceta (Assistente Social) com a ineficiência e negligência do Estado diante
                das múltiplas consequências da pandemia de covid-19 na vida dos brasileiros. Gustavo foi internado (e
                entubado) no final de 2020 para tratamento da doença e sofreu com as graves sequelas oriundas da infecção.
                Paola foi infectada enquanto cuidava de sua mãe, hospitalizada primeiramente para uma cirurgia de
                emergência, mas que também se infectou e faleceu da doença em março de 2021. Por terem atuado juntos na
                defesa de Direitos Humanos de outro coletivo da sociedade civil, sempre acreditaram que, diante da inação
                (intencional ou não) do Estado, somente a potência da mobilização social e o enfrentamento comunitário
                poderiam minimizar os diferentes impactos da pandemia no Brasil. Nasce, dessa força conjunta, um coletivo
                social que luta por justiça e memória às vítimas fatais e também pela garantia e acesso aos Direitos Humanos
                constitucionais dos sobreviventes da covid-19. Ainda que estejamos constituídos legalmente (com CNPJ), não
                somos uma empresa ou escritório de advocacia, não temos sede ou funcionários. Somos todos trabalhadores que
                paralelamente oferecem seu apoio e conhecimento solidária e coletivamente à outros como nós. Decidimos não
                ficar parados assistindo o Estado brasileiro contribuindo com o adoecimento e morte de nosso povo pela
                covid-19. E para isso, é fundamental que ocupemos os diversos espaços políticos e sociais da nossa
                sociedade, fazendo com que enxerguem e ouçam as nossas histórias. Somos vidas e amores de alguém e nunca nos
                reduzirão a números! É na luta coletiva que somos mais fortes!
            <p>
            <div class="text-center"><a class="btn btn-primary btn-xl text-uppercase"
                    href="{{ route('inscricao.avico') }}">Associe-se a AVICO</a>
            </div>
        </div>
    </section>
@endsection
