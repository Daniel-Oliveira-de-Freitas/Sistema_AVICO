@extends('layouts.app')
@section('title','Formulário para associar-se a Avico')
<link rel="stylesheet" href="/css/style.css">
@section('content')
<form action="">    
    <div class="form">
        <h1>Formulário de inscrição na Avico Brasil</h1>
        <h3>Nome Completo</h3>
        <input type="text">
        <h3>Cidade</h3>
        <input type="text">
        <h3>Estado UF</h3>
        <input type="text">
        <h3>E-mail</h3>
        <input type="email">
        <h3>WhatsApp (Código DDD + Número, sem caracteres). Não nós comunicamos por fone fixo!</h3>
        <input type="text">
        <h3>Qual sua profissão</h3>
        <input type="text">
        <h3>Você foi infectado(a) pela covid-19</h3>
        <input type="text">
        <h3>Em caso, positivo nós conte brevemente como foi?</h3>
        <input type="text">
        <h3>Você perdeu um familiar próximo pela covid-19</h3>
        <input type="text">
        <--!Revisar-->
        <h3>Em caso de positivo, diga o nome da pessoa, vinculo com você e como ocorreu?</h3>
        <input type="text">
        <h3>Por qual motivo você contatou a Avico</h3>
        <input type="text">
        <h3>Você deseja ser voluntario(a) da avico?</h3>
        <a><input type="checkbox"> Sim</a>
        <a><input type="checkbox"> Não</a>
        <--!Sugerir colocar um if else para caso seja sim na resposta anterior-->
        <h3>Caso queira ser voluntario(a), responda em que tipo de tarefa acha que poderia contribuir?</h3>
        <input type="text">
        <h3>Neste campo você pode registrar sugestões de ações futuras ou mesmo uma consulta a Avico:</h3>
        <h5>Você tem sugestões de atividades, ações, pautas, noticias, etc. Para a Avico?</h5>
        <input type="text">
        <br>
        <br>
        <button class="form_buttons" href="/">Voltar</button>
        <button class="form_buttons" >Enviar</button>
    </div>
    </form>
@endsection