<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.css" rel="stylesheet"> --}}
    <title>PDF</title>
</head>
<style>
    @media dompdf {
        * {
            line-height: 1.2;
        }
    }
</style>

<body>
    <div style="text-align: center">
        <img src="images\Logo_avico.png" height="!50" width="600" alt="AVico Logo">
    </div>
    <h1 class="text-center" style="text-align: center">TERMO DE ASSOCIAÇÃO</h1>
    <div class="card-body">

        <div class="form-content mb-3">
            <label class="mb-2">Deseja se tornar:</label>
            @foreach (\App\Enums\UserTypes::cases() as $key => $value)
                <br>
                <input class="tipo form-check-input" type="checkbox" name="tipo[]" id="{{ $value->value }}"
                    value="{{ $value->value }}" {{ in_array($value->value, $tipo) ? 'checked' : '' }}>
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
        </div>

        <div class="form-content">
            <div class="row">
                <div class="mb-3 form-group col">
                    <label>Nome completo: {{ $nome }}</label>
                </div>
                <br>
                <div class="mb-3 form-group col-md-6">
                    <label>Data de Nascimento: {{ $dataNascimento }}</label>
                </div>
                <br>
                <div class="mb-3 form-group">
                    <label>Gênero:</label>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" id="masculino"
                            value="Masculino" {{ $genero === 'Masculino' ? 'checked' : '' }}>
                        <label class="form-check-label">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" id="feminino"
                            value="Feminino" {{ $genero === 'Feminino' ? 'checked' : '' }}>
                        <label class="form-check-label">Feminino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" id="nao_binario"
                            value="Não-binário" {{ $genero === 'Não-binário' ? 'checked' : '' }}>
                        <label class="form-check-label">Não-binário</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" id="neutro"
                            value="Neutro" {{ $genero === 'Neutro' ? 'checked' : '' }}>
                        <label class="form-check-label">Prefiro Não Definir</label>
                    </div>
                </div>
                <br>
                <div class="mb-3 form-group">
                    <label>Raça/Cor:</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="raca_cor form-check-input" type="radio" name="raca_cor" id="branca"
                            value="Branca" {{ $raca_cor === 'Branca' ? 'checked' : '' }}>
                        <label class="form-check-label">Branca</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="raca_cor form-check-input" type="radio" name="raca_cor" id="Preta"
                            value="Preta" {{ $raca_cor === 'Preta' ? 'checked' : '' }}>
                        <label class="form-check-label">Preta</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="raca_cor" id="parda"
                            value="Parda" {{ $raca_cor === 'Parda' ? 'checked' : '' }}>
                        <label class="form-check-label">Parda</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="raca_cor form-check-input" type="radio" name="raca_cor" id="indigena"
                            value="Indígena" {{ $raca_cor === 'Indígena' ? 'checked' : '' }}>
                        <label class="form-check-label">Indígena</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="raca_cor form-check-input" type="radio" name="raca_cor" id="amarela"
                            value="Amarela" {{ $raca_cor === 'Amarela' ? 'checked' : '' }}>
                        <label class="form-check-label">Amarela </label>
                    </div>
                </div>
                <br>
                <div class="mb-3 col-md-6">
                    <label>CPF: {{ $cpf }}</label>
                </div>
                <br>
                <div class="mb-3 col-md-6">
                    <label>RG: {{ $rg }}</label>
                </div><br>
                <div class="mb-3 col-md-6">
                    <label>Celular (DDD+número):{{ $celular }}</label>
                </div><br>
                <div class="mb-3 col-md-6">
                    <label>Telefone residencial (DDD+número): {{ $telefone_residencial }}</label>
                </div><br>
                <div class="mb-3">
                    <label>E-mail: {{ $email }}</label>
                </div><br>
                <div class="mb-3 col-md-3">
                    <label>CEP: {{ $cep }}</label>
                </div><br>
                <div class="mb-3 col-md-7">
                    <label>Endereço: {{ $endereco }}</label>
                </div><br>
                <div class="mb-3 col-md-2">
                    <label>Nº: {{ $nmrEndereco }}</label>
                </div><br>
                <div class="mb-3 col-md-6">
                    <label>Cidade: {{ $cidade }}</label>
                </div><br>
                <div class="mb-3 col-md-2">
                    <label>UF: {{ $uf }}</label>
                </div><br>
                <div class="mb-3 col-md-4">
                    <label>Complemento: {{ $complemento }}</label>
                </div><br>
                <div class="mb-3">
                    <label>Bairro: {{ $bairro }}</label>
                </div><br>
                <div class="mb-3 ">
                    <label>Profissão: {{ $profissao }}</label>
                </div><br>
                <div class="mb-3">
                    <label>Qual sua condição para se tornar associado?</label>

                    <div class="form-check">
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            id="sobrevivente" value="Sobrevivente da COVID-19"
                            {{ in_array('Sobrevivente da COVID-19', $condicoes) ? 'checked' : '' }} />
                        <label for="">Sobrevivente da COVID-19</label>
                    </div>
                    <div class="form-check">
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]" id="familiar"
                            value="Familiar de vítima da COVID-19"
                            {{ in_array('Familiar de vítima da COVID-19', $condicoes) ? 'checked' : '' }}>
                        <label for="">Familiar de vítima da COVID-19</label>
                    </div>
                    <div class="form-check">
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]" id="nenhum"
                            value="Nenhuma das alternativas acima"
                            {{ in_array('Nenhuma das alternativas acima', $condicoes) ? 'checked' : '' }}>
                        <label for="">Nenhuma das alternativas acima</label>
                    </div>
                </div>
                <br>
                <div id="grauParentesco" class="mb-3">
                    <label>Qual o grau de parentesco com a vítima? {{ $parentesco }}</label>
                    <br>
                    <div id="outrosInput">
                        <label>Por favor, especifique no campo abaixo: {{ $outros }}</label>
                    </div><br>
                </div>
                <div class="mb-3">
                    <label> Informe no campo abaixo quantas pessoas do seu grupo familiar nuclear você perdeu
                        para a COVID-19 (mãe, pai, filho, filha, avô, avó, pais, cônjuges).</label><br>
                    @foreach ($dadosAdicionais as $key => $input)
                    <br>
                        <div class="mb-3  col-md-4">
                            <label for="dadosAdicionais_nome">Nome Completo: {{ $input['nome'] }}</label>
                        </div><br>
                        <div class="mb-3 col-md-6">
                            <label for="dadosAdicionais_parentesco">Grau de parentesco:
                                {{ $input['parentesco'] }}</label>
                        </div><br>
                        <div class="mb-3 col-md-2">
                            <label for="dadosAdicionais_idade">idade: {{ $input['idade'] }}</label>
                        </div><br>
                    @endforeach
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
                <input class="pagamento form-check-input" type="radio" name="pagamento" id="{{ $value->value }}"
                    value="{{ $value->value }}" {{ $pagamento === $value->value ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $value->name }}">{{ $value->name }}</label>
            @endforeach
        </div>
        <p class="mt-2 mb-2">2. Os casos de isenção serão analisados pela Diretoria da AVICO, de acordo com a
            renda bruta
            familiar do associado (renda bruta de até de 1,5 salário mínimo per capita) que deverá ser
            comprovada pelo
            envio de documentos que demonstrem a renda.</p>

        <input name="declaracao_isencao" id="declaracao_isencao" class="form-check-input" type="checkbox"
            {{ $declaracao_isencao === true ? 'checked' : '' }}>
        <label for="declaracao">Declaro não ter condições de arcar com as mensalidades da AVICO, e solicito
            analise socio economica familia pela diretoria da AVICO.</label>
    </div>
    <br><br><br><br>
    <div>
        <label for="text" >Data:</label>
        <label >__/__/____</label>
    </div><br><br><br><br><br>
    <div style="text-align: center">
        <label >_________________________________</label><br>
        <label for="declaracao" style="text-align: center">Assinatura requerente</label>
    </div><br><br><br>
        <div  style="text-align: center">
            <label>_________________________________</label><br>
            <label for="declaracao" style="text-align: center">Assinatura.</label>
        </div><br><br><br>
        <div style="text-align: center">
            <label>_________________________________</label><br>
            <label style="text-align: center" for="declaracao">Assinatura</label>
        </div>
    </div>

</body>

</html>
