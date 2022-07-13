@extends('layouts.app')
@section('title', 'Formulário para associar-se a Avico')
<style>
    .form-content {
        display: none;
    }
    .form-content.current {
        display: inherit;
    }
    p {
        font-weight: bold
    }
    .parsley-errors-list {
        list-style: none;
        color: red;
    }
    .btn-info,
    .btn-sucess {
        margin-top: 10px;
        margin-bottom: 80px;
        display: block;
    }
    #grauParentesco {
        display: none;
    }
    #outrosInput {
        display: none;
    }
    #certidao_obito {
        display: none;
    }
    #comprovante {
        display: none;
    }
    .form_body{
    font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
</style>

@section('content')
    <div class="form_body container rows col-md-6 offset-md-3 ">
        <h1 class="text-center">Formulario de Cadastro Avico</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            @endif
        <div class="card-body">
            <p class="text-center">Os campos destacados com * indicam que são Obrigatórios !!</p>
            <h6 class="text-center" id="obrigatorio"><small>{!! session()->get('sucess001') !!}</small></h6>
            <form action="{{route('inscricao.store') }}" method="POST" class="form-cadastro" enctype="multipart/form-data">
                @csrf
                <div class="form-content">
                    <div class="mb-3">
                        <label>Deseja se tornar:</label>
                        <div>
                            <input class="tipo form-check-input" type="checkbox" name="tipo" id="voluntario"
                                value="Voluntario" data-parsley-required data-parsley-mincheck="1"
                                data-parsley-required-message="Você deve selecionar uma opção">
                            <label class="form-check-label" for="voluntario">Voluntario</label>
                        </div>
                        <div class="form-check">
                            <input class="tipo form-check-input" type="checkbox" name="tipo" id="associado"
                                value="Associado" onchange="fieldRequired()">
                            <label class="form-check-label" for="associado">Associado</label>
                        </div>
                    </div>
                </div>
                <div class="form-content">
                    <div class="form-group">
                        <div class="text-sm-start form-check">
                        
                            <h1 class="text-center mb-12">TERMO DE ASSOCIAÇÃO</h1>
                            <p> 1. Os dados fornecidos serão utilizados exclusivamente pela nossa Associação, sendo vedado o
                                uso
                                para fins
                                diversos, seguindo a Lei Geral Proteção de Dados LEI Nº 13.709, DE 14 DE AGOSTO DE 2018.
                            </p>
                            <p class="associacao">
                                2. Venho, através do preenchimento dos dados solicitados neste Termo de Associação, requerer
                                a admissão
                                como Associado da AVICO – Associação de Vítimas e Familiares de vítimas de COVID-19,
                                inscrita no
                                CNPJ
                                sob nº
                                42.900.150/0001-00, com sede na Avenida Praia de Belas, nº 454, apto 201, Praia de Belas,
                                CEP
                                90110-000,
                                Porto
                                Alegre/RS, de acordo com o artigo 27, parágrafo segundo, do Estatuto e suas alterações,
                                disponível no
                                site
                                www.avico.com.br, do qual declaro, por meio deste termo, ter total conhecimento e me
                                comprometo
                                a
                                respeitar
                                todas as suas disposições.
                            </p>
                            <p>3. Estou ciente e de acordo em disponibilizar meus dados pessoais para cadastro na AVICO e de
                                que serão utilizados com a finalidade de controle social, bem como ajudar nas atividades
                                desenvolvidas pela organização. Autorizo a AVICO, ao uso e divulgação da minha imagem,
                                incluindo em atividades do advocacy, materiais de mídia como fotos, vídeos e documentos, e
                                para utilização de relatório e atividades de divulgação, sem que nada haja a ser reclamado a
                                título de direitos relacionados à minha imagem. Bem como, também autorizo o recebimento de
                                informações via e-mail, WhatsApp, SMS sobre a associação. Este consentimento serve para
                                atender aos requisitos da Lei nº 13.709/18 (Lei Geral de Proteção de Dados).
                            </p>
                            <p class="associacao">4. Tenho ciência de que, ao solicitar o presente requerimento de
                                associação à AVICO, devo
                                conhecer e cumprir com o Estatuto Social, decisões internas e Regimentos Internos,
                                incluindo, mas não se limitando, ao Código de Conduta, Políticas e Procedimentos, sob pena
                                de aplicação dos artigos 29 a 33 do Estatuto Social.</p>
                        </div>

                        <input id="termos" name="termos" class=" form-check-input" type="checkbox" required>
                        <label for="termos">Concorda com os termos de associação?*</label>
                    </div>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="form-group col">
                            <span>Nome completo*</label>
                                <input class="form-control form-control-lg text-break" type="text" name="nome" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Data de Nascimento*</label>
                                <input class="form-control" type="date" name="dataNascimento">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="senha">Digite sua senha:</label>
                                <input class="password  form-control" type="password" id="password" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="senha">Confirmar senha:</label>
                                <input class="form-control" type="password" id="confirmPassword" required>
                                <span id='message'></span>
                            </div>
                            <div class="mb-3 form-group">
                                <label>Gênero*</label>
                                <div class="form-check">
                                    <label class="form-check-label">Masculino</label>
                            <input class="genero form-check-input" type="checkbox" name="genero" id="Masculino"
                                value="Masculino" data-parsley-required data-parsley-mincheck="1"
                                data-parsley-required-message="Você deve selecionar uma opção">
                            </div>
                            <div class="form-check">
                            <input class="genero form-check-input" type="checkbox" name="genero" id="Feminino"
                            value="Feminino">
                            <label class="form-check-label">Feminino</label>
                        </div>
                        <div class="form-check">
                            <input class="genero form-check-input" type="checkbox" name="genero" id="Neutro"
                            value="Neutro">
                            <label class="form-check-label">Neutro</label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>CPF*</label>
                        <input class="form-control" type="number" name="cpf" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>RG*</label>
                        <input class="form-control" type="number" name="rg" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>Celular (DDD+número)*</label>
                        <input class="form-control" type="number" placeholder="(DDD+número)" name="celular" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>Telefone residencial (DDD+número)</label>
                        <input class="form-control" type="number" placeholder="(DDD+número)" name="telefone_residencial">
                    </div>
                    <div class="mb-3">
                        <label>E-mail*</label>
                        <input class="form-control" type="email" placeholder="nome@exemplo.com" name="email" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label>Endereço*</label>
                        <input class="form-control" type="text" name="endereco" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label>Nº*</label>
                        <input class="form-control" type="number" name="nmrEndereco" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>Complemento</label>
                        <input class="form-control" type="text" name="complemento">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label>CEP*</label>
                        <input class="form-control" type="text" name="cep" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label>Bairro*</label>
                        <input class="form-control" type="text" name="bairro" required>
                    </div>
                    <div class="mb-3 col-md-5">
                        <label>Cidade/UF*</label>
                        <input class="form-control" type="text" name="cidade_uf" required>
                    </div>
                    <div class="mb-3 ">
                        <label>Profissão</label>
                        <input class="form-control" type="text" name="profissao">
                    </div>
                    <div class="mb-3">
                        <label>Qual sua condição para se tornar associado?*</label>

                        <div class="form-check">
                            <label for="">Sobrevivente da COVID-19</label>
                            <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            id="sobrevivente" value="Sobrevivente da COVID-19" onchange="condicaoChanged()"
                            data-parsley-required data-parsley-mincheck="1"
                            data-parsley-required-message="Você deve selecionar uma ou mais caixas" />
                        </div>
                        <div class="form-check">
                                <label for="">Familiar de vítima da COVID-19</label>
                                
                                <input class="condicao form-check-input" type="checkbox" name="condicoes[]" id="familiar"
                                value="Familiar de vítima da COVID-19" onchange="condicaoChanged()">
                            </div>
                            <div class="form-check">
                                <label for="">Nenhuma das alternativas acima</label>
                                
                                <input class="condicao form-check-input" type="checkbox" name="condicoes[]" id="nenhum"
                                value="Nenhuma das alternativas acima">
                            </div>
                        </div>
                        <div id="grauParentesco" class="mb-3">
                            <label>Qual o grau de parentesco com a vítima?*</label>
                            <select onchange="outrosInputShow()" class="parentesco" id="parentesco" required>
                                <option value="Cônjuge ou companheiro(a)">Cônjuge ou companheiro(a)</option>
                            <option value="1º grau em linha reta (pai/mãe, filho/filha)">1º grau em linha reta (pai/mãe,
                                filho/filha)</option>
                                <option value="2º grau em linha reta (avô/avó, neto/neta)">2º grau em linha reta (avô/avó,
                                    neto/neta)
                                </option>
                                <option value="3º grau em linha colateral (tio/tia, sobrinho/sobrinha)">3º grau em linha
                                    colateral (tio/tia, sobrinho/sobrinha)</option>
                            <option id="outros" value="outros">Outros</option>
                        </select>
                        <div id="outrosInput">
                            <span>Por favor, especifique no campo abaixo:*</span>
                            <input class="outrosData form-control" name="outro" id="outrosData" type="text"
                            required>
                        </div>
                    </div>
                </div>
            </div>
                <div class="form-content mb-3">
                    <p>1. Tornando-se associado, você está ciente do pagamento do valor de R$ 40,00 (quarenta reais) mensais
                        a
                        título de contribuição à AVICO.
                    </p>
                    <p>2. Os casos de isenção serão analisados pela Diretoria da AVICO, de acordo com a renda bruta familiar
                        do
                        associado (renda bruta de até de 1,5 salário mínimo per capita) que deverá ser comprovada pelo envio
                        de
                        documentos que demonstrem a renda.</p>
                    <label>O pagamento da mensalidade acima informada será realizada da seguinte forma:
                    </label>

                    <div class="form-check">
                        <label class="form-check-label">Depósito</label>
                        <input class="pagamento form-check-input" type="checkbox" name="pagamento" id="deposito"
                            value="Depósito" data-parsley-required data-parsley-mincheck="1"
                            data-parsley-required-message="Você deve selecionar uma ou mais condições">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">Pix</label>
                        <input class="pagamento form-check-input" type="checkbox" name="pagamento" id="pix"
                            value="Pix">
                    </div>
                </div>

                <div class="form-content mb-3">
                    <p>1. Estou de acordo e entendo que devo encaminhar para o e-mail avico@gmail.com , juntamente com o
                        presente termo devidamente assinado, os documentos abaixo elecancados, em boa ordem, legíveis e
                        digitalizados, sob pena de indeferimento imediato do requerimento:
                    </p>
                    <div class="mb-3" id="rgCPF">
                        <label class="form-label" for="Cópia do RG/CPF">CPF/RG</label>
                        <input class="form-control" type="file" onchange="fileValidation()" name="filenames[]" id="cpf_rg"
                         accept="image/.jpg,.png,.jpeg" multiple required>
                    </div>
                    <div class="mb-3" id="comprovante">
                        <label class="form-label" for="">Cópia de Comprovante Médico de existência de sequelas da
                            COVID-19 (em caso de sobrevivente)
                        </label>
                        <input class="form-control" type="file" name="filenames[]"
                            onchange="fileValidation()" id="comprovanteMedico" accept="image/.jpg,.png,.jpeg"
                            multiple required>
                    </div>
                    <div class="mb-3" id="certidao_obito">
                        <label class="form-label" for="">Cópia da Certidão de Óbito da vítima (em caso de familiar
                            de vítima)
                        </label>
                        <input class="form-control" type="file" name="filenames[]" onchange="fileValidation()"
                            id="certidaoObito" accept="image/.jpg,.png,.jpeg" multiple required>
                    </div>

                    <div class="mb-3" id="compEndereco">
                        <label class="form-label" for="">Cópia de Comprovante de Endereço</label>
                        <input class="form-control" type="file" name="filenames[]"
                            onchange="fileValidation()" id="comprovanteEndereco" accept="image/.jpg,.png,.jpeg"
                            multiple required>
                    </div>
                    <div class="mb-3" id="comprovanteRendaFamiliar">
                        <label class="form-label" for="">Para casos de isenção de contribuição (renda familiar
                            bruta de até 1,5 salário mínimo per capita), cópia dos documentos comprobatórios de renda
                            familiar. Ex: holerites dos membros da família ou outros documentos que comprovem a renda
                            familiar.
                        </label>
                        <input class="form-control" type="file" onchange="fileValidation()" name="filenames[]" id="comprovanteRenda"
                            accept="image/.jpg,.png,.jpeg" multiple required>
                    </div>
                </div>

                <div class="form-navigation mb-3 d-grid gap-1 d-md-flex justify-content-md-center">
                    <button type="button" class="previous btn btn-info float-left">Anterior</button>
                    <button type="button" class="next btn btn-info float-right">Proximo</button>
                    <button type="submit" class="btn btn-sucess float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./js/validations.js"></script>
@endsection