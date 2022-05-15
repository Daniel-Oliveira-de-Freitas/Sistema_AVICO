@extends('layouts.app')
@section('title', 'Formulário para associar-se a Avico')
<link rel="stylesheet" href="/css/style.css">
@section('content')
    <form action="{{ action('App\Http\Controllers\AssocieController@store') }}" method="post" class="form">
        {{ csrf_field() }}
        <div class="form_contents">
            <h1>Formulário de inscrição na Avico Brasil</h1>
            @if ($errors->any())
                <ul class="form_ErrorField">
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form_field">
                <h3>Nome Completo</h3>
                <input type="text" name="nome" class="form_input">
            </div>

            <div class="form_field">
                <h3>Cidade</h3>
                <input type="text" name="cidade" class="form_input">
            </div>

            <div class="form_field">
                <h3 form_UF-field>Estado UF</h3>
                <input type="text" name="estado" class="form_input">
            </div>

            <div class="form_field">
                <h3>E-mail</h3>
                <input type="email" name="email" class="form_input">
            </div>

            <div class="form_field">
                <h3>WhatsApp (Código DDD + Número, sem caracteres). Não nós comunicamos por fone fixo!</h3>
                <input type="number" name="telefone" class="form_input">
            </div>

            <div class="form_field">
                <h3>Qual sua profissão?</h3>
                <input type="text" name="profissao" class="form_input">
            </div>

            <div class="form_field">
                <h3>Você foi infectado(a) pela covid-19</h3>
                <input type="text" name="infectado" class="form_input">
            </div>

            <div class="form_field">
                <h3>Em caso, positivo nós conte brevemente como foi?</h3>
                <input type="text" name="descricao" class="form_input">
            </div>

            {{-- Verificar se é necessario realizar persistencia --}}
            <div class="form_field">
                <h3>Você perdeu um familiar próximo pela covid-19</h3>
                <a><input type="radio" name="perda" value="Sim"> Sim</a>
                <a><input type="radio" name="perda" value="Não"> Não</a>
            </div>

             {{-- Verificar se é necessario realizar persistencia --}}
            <div class="form_field">
                <h3>Em caso de positivo, diga o nome da pessoa, vinculo com você e como ocorreu?</h3>
                <input type="text" name="vinculo" class="form_input">
            </div>

            <div class="form_field">
                <h3>Por qual motivo você contatou a Avico</h3>
                <a><input type="checkbox" name="motivo[]" value="Receber orientação jurídica relacionada a covid-19">
                    Receber orientação jurídica relacionada a covid-19</a>
                <a><input type="checkbox" name="motivo[]" value="Participar do Grupo de Apoio às Pessoas em Luto (exclusivo para familiares de vítimas)">
                    Participar do Grupo de Apoio às Pessoas em Luto (exclusivo para familiares de vítimas)</a>
                <a><input type="checkbox" name="motivo[]" value="Eu quero apoiar a luta da Avico como voluntário"> Eu quero
                    apoiar a luta da Avico como voluntário</a>
                <a><input type="checkbox" name="motivo[]" value="Eu quero apoiar a luta da Avico como doador"> 
                    Eu quero apoiar a luta da Avico como doador</a>
            </div>

            <div class="form_field">
                <h3>Você deseja ser voluntario(a) da avico?</h3>
                <a><input type="radio" name="voluntario" value="Sim"> Sim</a>
                <a><input type="radio" name="voluntario" value="Não"> Não</a>
            </div>

            {{-- <a> Sugerir colocar um if else para caso seja sim na resposta anterior<a> --}}
            <div class="form_field">
                <h3>Caso queira ser voluntario(a), responda em que tipo de tarefa acha que poderia contribuir?</h3>
                <input type="text" name="contribuicao" class="form_input">
            </div>

            <div class="form_field">
                <h3>Neste campo você pode registrar sugestões de ações futuras ou mesmo uma consulta a Avico:</h3>
                <h5>Você tem sugestões de atividades, ações, pautas, noticias, etc. Para a Avico?</h5>
                <input type="text" name="indicacoes" class="form_input">
            </div>
            <div class="form_buttonsContent">
                <button type="submit" class="form_buttonSubmit">Enviar</button>
            </div>
        </div>
    </form>
@endsection
