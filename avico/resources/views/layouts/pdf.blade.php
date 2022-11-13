<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <title>PDF</title>
</head>

<body>
    <h1 class="text-center">TERMO DE ASSOCIAÇÃO</h1>
    <div class="card-body">
        <form action="{{ route('inscricao.store') }}" method="POST" class="form-cadastro" id="formulario"
            enctype="multipart/form-data">
            @csrf
            <div class="form-content mb-3">
                <label class="mb-2">Deseja se tornar:</label>
                @foreach (\App\Enums\UserTypes::cases() as $key => $value)
                    <br>
                    <input class="tipo form-check-input" type="checkbox" name="tipo[]" id="{{ $value->value }}"
                        value="{{ $value->value }}" data-parsley-required data-parsley-mincheck="1"
                        data-parsley-required-message="Você deve selecionar uma opção">
                    <label class="form-check-label" for="{{ $value->name }}"> {{ $value->name }}</label>
                @endforeach
            </div>
            <div class="form-content">
                <div class="form-group text-sm-start form-check">

                    <p> 1. Os dados fornecidos serão utilizados exclusivamente pela nossa Associação, sendo
                        vedado o
                        uso
                        para fins
                        diversos, seguindo a Lei Geral Proteção de Dados LEI Nº 13.709, DE 14 DE AGOSTO DE 2018.
                    </p>
                    <p>
                        2. Venho, através do preenchimento dos dados solicitados neste Termo de Associação,
                        requerer a admissão como Associado da AVICO – Associação de Vítimas e Familiares de vítimas de
                        COVID-19,
                        inscrita no CNPJ sob nº 42.900.150/0001-00, com sede na Avenida Praia de Belas, nº 454, apto
                        201, Praia de
                        Belas, CEP 90110-000, Porto Alegre/RS, de acordo com o artigo 27, parágrafo segundo, do Estatuto
                        e suas alterações,
                        disponível no site www.avico.com.br, do qual declaro, por meio deste termo, ter total
                        conhecimento e me
                        comprometo a respeitar todas as suas disposições.
                    </p>
                    <p>3. Estou ciente e de acordo em disponibilizar meus dados pessoais para cadastro na AVICO
                        e de
                        que serão utilizados com a finalidade de controle social, bem como ajudar nas atividades
                        desenvolvidas pela organização. Autorizo a AVICO, ao uso e divulgação da minha imagem,
                        incluindo em atividades do advocacy, materiais de mídia como fotos, vídeos e documentos,
                        e
                        para utilização de relatório e atividades de divulgação, sem que nada haja a ser
                        reclamado a
                        título de direitos relacionados à minha imagem. Bem como, também autorizo o recebimento
                        de
                        informações via e-mail, WhatsApp, SMS sobre a associação. Este consentimento serve para
                        atender aos requisitos da Lei nº 13.709/18 (Lei Geral de Proteção de Dados).
                    </p>
                    <p>4. Tenho ciência de que, ao solicitar o presente requerimento de
                        associação à AVICO, devo
                        conhecer e cumprir com o Estatuto Social, decisões internas e Regimentos Internos,
                        incluindo, mas não se limitando, ao Código de Conduta, Políticas e Procedimentos, sob
                        pena
                        de aplicação dos artigos 29 a 33 do Estatuto Social.</p>
                </div>

                <input id="termos" name="termos" class=" form-check-input" type="checkbox" required>
                <label for="termos">Concorda com os termos de associação?*</label>
            </div>

            <div class="form-content">
                <div class="row">
                    <div class="mb-3 form-group col">
                        <span>Nome completo*</span>
                        <input class="form-control form-control text-break" type="text" name="nome" id="nome"
                            required>
                    </div>
                    <div class="mb-3 form-group col-md-6">
                        <label>Data de Nascimento*</label>
                        <input class="form-control" type="text" name="dataNascimento" id="dataNascimento">
                    </div>
                    <div class="mb-3 form-group">
                        <label>Gênero*</label>
                        <div class="form-check form-check-inline">
                            <input class="genero form-check-input" type="checkbox" name="genero" id="masculino"
                                value="Masculino">
                            <label class="form-check-label">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="genero form-check-input" type="checkbox" name="genero" id="feminino"
                                value="Feminino">
                            <label class="form-check-label">Feminino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="genero form-check-input" type="checkbox" name="genero" id="nao_binario"
                                value="Não-binário">
                            <label class="form-check-label">Não-binário</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="genero form-check-input" type="checkbox" name="genero" id="neutro"
                                value="Neutro">
                            <label class="form-check-label">Prefiro Não Definir</label>
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label>Raça/Cor*</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="raca_cor form-check-input" type="checkbox" name="raca_cor" id="branca"
                                value="Branca">
                            <label class="form-check-label">Branca</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="raca_cor form-check-input" type="checkbox" name="raca_cor" id="Preta"
                                value="Preta">
                            <label class="form-check-label">Preta</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="genero form-check-input" type="checkbox" name="raca_cor" id="parda"
                                value="Parda">
                            <label class="form-check-label">Parda</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="raca_cor form-check-input" type="checkbox" name="raca_cor" id="indigena"
                                value="Indígena">
                            <label class="form-check-label">Indígena</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="raca_cor form-check-input" type="checkbox" name="raca_cor" id="amarela"
                                value="Amarela ">
                            <label class="form-check-label">Amarela </label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>CPF*</label>
                        <input class="form-control" type="text" name="cpf" id="cpf" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>RG*</label>
                        <input class="form-control" type="text" name="rg" id="rg" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>Celular (DDD+número)*</label>
                        <input class="form-control" type="text" name="celular" id="celular" required>
                        <br>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>Telefone residencial (DDD+número)</label>
                        <input class="form-control" type="text" name="telefone_residencial"
                            id="telefone_residencial">
                        <br>
                    </div>
                    <div class="mb-3">
                        <label>E-mail*</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label>CEP*</label>
                        <input class="form-control" type="text" name="cep" id="cep">
                    </div>
                    <div class="mb-3 col-md-7">
                        <label>Endereço*</label>
                        <input class="form-control" type="text" name="endereco" id="endereco" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label>Nº*</label>
                        <input class="form-control" type="number" name="nmrEndereco" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>Cidade*</label>
                        <input class="form-control" type="text" name="cidade" id="cidade" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label>UF*</label>
                        <input class="form-control" type="text" name="uf" id="uf" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>Complemento</label>
                        <input class="form-control" type="text" name="complemento" id="complemento">
                    </div>
                    <div class="mb-3">
                        <label>Bairro*</label>
                        <input class="form-control" type="text" name="bairro" id="bairro" required>
                    </div>
                    <div class="mb-3 ">
                        <label>Profissão*</label>
                        <input class="form-control" type="text" name="profissao" required>
                    </div>
                    <div class="mb-3">
                        <label>Qual sua condição para se tornar associado?*</label>

                        <div class="form-check">
                            <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                                id="sobrevivente" value="Sobrevivente da COVID-19" />
                            <label for="">Sobrevivente da COVID-19</label>
                        </div>
                        <div class="form-check">
                            <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                                id="familiar" value="Familiar de vítima da COVID-19">
                            <label for="">Familiar de vítima da COVID-19</label>
                        </div>
                        <div class="form-check">
                            <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                                id="nenhum" value="Nenhuma das alternativas acima">
                            <label for="">Nenhuma das alternativas acima</label>
                        </div>
                    </div>
                    <div id="grauParentesco" class="mb-3">
                        <label>Qual o grau de parentesco com a vítima?*</label>
                        <input class="form-control" type="text" name="parentesco" id="parentesco" required>
                        <div id="outrosInput">
                            <span>Por favor, especifique no campo abaixo:*</span>
                            <input class="outrosData form-control" name="outro" id="outrosData" type="text"
                                required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label> Informe no campo abaixo quantas pessoas do seu grupo familiar nuclear você perdeu para a
                            COVID-19 (mãe, pai,
                            filho, filha, avô, avó, pais, cônjuges).</label>
                        <div id="field" class="row mt-3">
                            <div class="mb-3 col">
                                <label for="nome">Nome Completo</label>
                                <input class="form-control " type="text" name="nomeParente" id="nomeParente">
                            </div>
                            <div class="mb-3 col-md-2">
                                <label for="idade">idade</label>
                                <input class="form-control" type="text" name="idadeParente" id="idadeParente"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-content mb-3">
                <p>1. Tornando-se associado, você está ciente do pagamento do valor de R$ 40,00 (quarenta reais)
                    mensais a título de contribuição à AVICO.
                </p>
                <label>O pagamento da mensalidade acima informada será realizada da seguinte forma:</label>
                <div class="form-check mb-2">
                    @foreach (\App\Enums\PaymentTypes::cases() as $key => $value)
                        <br>
                        <label class="form-check-label" for="{{ $value->name }}">{{ $value->name }}</label>
                        <input class="pagamento form-check-input" type="radio" name="pagamento"
                            id="{{ $value->value }}" value="{{ $value->value }}" data-parsley-required
                            data-parsley-required-message="Você deve selecionar um tipo de pagamento">
                    @endforeach
                </div>
                <p class="mb-2">2. Os casos de isenção serão analisados pela Diretoria da AVICO, de acordo com a
                    renda bruta
                    familiar do associado (renda bruta de até de 1,5 salário mínimo per capita) que deverá ser
                    comprovada pelo
                    envio de documentos que demonstrem a renda.</p>

                <input name="declaracao_isencao" id="declaracao_isencao" class="form-check-input" type="checkbox">
                <label for="declaracao">Declaro não ter condições de arcar com as mensalidades da AVICO, e solicito
                    analise socio economica familia pela diretoria da AVICO.</label>
            </div>
            <br><br><br><br>
            <div>
                <label for="text">Data:</label>
                <label>__/__/____</label>
            </div>
            <div><label>_________________________________</label><br>
                <label for="declaracao">Assinatura do associado/voluntário.</label>
            </div>
            <br>
            <div><label>_________________________________</label><br>
                <label for="declaracao">Assinatura da presidente.</label>
            </div>
            <br>
            <div><label>_________________________________</label><br>
                <label for="declaracao">Assinatura da vice-presidente.</label>
            </div>
    </div>

</body>

</html>
