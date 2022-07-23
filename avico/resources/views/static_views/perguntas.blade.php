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
                                Como funciona o processo de Ação Civil Pública contra a União?
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <p class="faq">Ação Civil pública contra a União ela não irá beneficiar ninguém diretamente. Ela serve para discutir se os familiares de vítimas e sobreviventes com sequelas graves têm ou não tem direito a indenização relativa ao que o Estado Brasileiro deixou de fazer durante a pandemia. O processo finaliza com a decisão do juiz. Se por acaso ele decidir que temos direito. O processo encerra nessa fase. E essa ação  não tem custo para ninguém porque ele foi ajuizada pelo Ministério Público, considerado pela Constituição Federal de  1988 o fiscal da lei e defensor da sociedade. 
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                O Voluntário precisa contribuir com algum tipo de valor?
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                Não precisa, mas caso queira fazer algum tipo de contribuição você poderá fazer.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Fiz o cadastro no site, porém não sei se já sou associado/voluntário.
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                Após a realização do cadastro, faremos a validação da pessoa que se cadastrou, verificando se está apta a ser associada/voluntária da AVICO, portanto, nos próximos dias fique de olho em seu email, pois poderá ser enviado uma confirmação deste cadastro.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                A AVICO tem uma sede, qual seria o endereço?
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                            <div class="accordion-body">
                                Atualmente a AVICO não possui nenhuma sede física, atuamos de maneira online.
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                                Como posso entrar em contato com vocês?
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                            <div class="accordion-body">
                            Para entrar em contato com a AVICO basta preencher as informações neste <a href="/fale_conosco">link</a>. Ou entrar em contato através das nossas redes sociais.
                            </div>
                            </div>
                        </div>
                    </div>       
    </main>
</section>
@endsection