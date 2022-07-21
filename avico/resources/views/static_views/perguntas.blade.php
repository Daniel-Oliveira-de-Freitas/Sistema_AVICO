@extends('layouts.app')
@section('content')
<section class="page-section">

    <main class="container container-texto">

                <!--<h3>Perguntas Frequentes</h3>
         
                <h2>Como funciona o sistema?</h2>
                <p>
                    O sistema funciona de forma simples, basta se cadastrar e se inscrever em um dos eventos.
                </p>
                <h2>Como faço para me inscrever em um evento?</h2>
                <p>
                    Para se inscrever em um evento basta clicar no botão "Inscrever-se" e preencher o formulário.
                </p>
                <h2>Como faço para me cadastrar?</h2>
                <p>
                    Para se cadastrar basta clicar no botão "Cadastrar" e preencher o formulário.
                </p>
                <h2>Como faço para me logar?</h2>
                <p>
                    Para se logar basta clicar no botão "Login" e preencher o formulário.
                </p>
                <h2>Como faço para me deslogar?</h2>
                <p>
                    Para se deslogar basta clicar no botão "Logout" e será redirecionado para a página inicial.
                </p>
                <h2>Como faço para alterar meus dados?</h2>
                <p>
                    Para alterar seus dados basta clicar no botão "Editar" e preencher o formulário.
                </p>
                <h2>Como faço para excluir meu cadastro?</h2>
                <p>
                    Para exclusão de seu cadastro basta clicar no botão "Excluir" e será redirecionado para a página inicial.   <br>
                -->

                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Pergunta #1
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                Resposta da primeira pergunta Resposta da primeira pergunta Resposta da primeira perguntaResposta da primeira perguntaResposta da primeira perguntaResposta da primeira perguntaResposta da primeira perguntaResposta da primeira perguntaResposta da primeira pergunta 

                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Pergunta #2
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                Resposta da segunda perguntaResposta da segunda perguntaResposta da segunda perguntaResposta da segunda perguntaResposta da segunda pergunta
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Pergunta #3
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                Resposta da terceira perguntaResposta da terceira perguntaResposta da terceira perguntaResposta da terceira perguntaResposta da terceira perguntaResposta da terceira pergunta
                            </div>
                            </div>
                        </div>
                    </div>       
    </main>
</section>
@endsection