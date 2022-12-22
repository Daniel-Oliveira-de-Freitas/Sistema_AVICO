<div>
    @if (session('success'))
        @include(session('success'))
    @elseif(session('fail'))
        @include(session('fail'))
    @endif
    <h1 class="text-center">Formulário de Cadastro Avico</h1>
    <x-alert alertType="warning" dismissible='false'
        message="Os campos destacados com * indicam que são Obrigatórios !!" />
    <form class="form-cadastro" wire:submit.prevent="submit" enctype="multipart/form-data">
        @csrf
        @if ($currentStep == 1)
            <div class="form-check">
                <label class="mb-2">Deseja se tornar:*</label>
                @foreach (\App\Enums\UserTypes::cases() as $key => $value)
                    <br>
                    <input class="tipo form-check-input" type="checkbox" name="tipo[]" wire:model="tipo"
                        id="{{ $value->value }}" value="{{ $value->value }}">
                    <label class="form-check-label" for="{{ $value->name }}"> {{ $value->name }}</label>
                @endforeach
                <x-error-message errorName="tipo" />
            </div>
        @endif
        @if ($currentStep == 2)
            <div class="form-check">
                <div class="text-sm-start" id="termos_associacao">
                    <h1 class="text-center">TERMO DE ASSOCIAÇÃO</h1>
                    <p> 1. Os dados fornecidos serão utilizados exclusivamente pela nossa Associação, sendo
                        vedado o
                        uso
                        para fins
                        diversos, seguindo a Lei Geral Proteção de Dados LEI Nº 13.709, DE 14 DE AGOSTO DE 2018.
                    </p>
                    <p>
                        2. Venho, através do preenchimento dos dados solicitados neste Termo de Associação,
                        requerer a admissão como Associado da AVICO – Associação de Vítimas e Familiares de
                        vítimas
                        de COVID-19,
                        inscrita no CNPJ sob nº 42.900.150/0001-00, com sede na Avenida Carlos Gomes, nº
                        111, conjunto 1101 Bairro Auxiliadora, CEP 90480-003, Porto Alegre/RS, de acordo com o
                        artigo 27, parágrafo segundo, do Estatuto e suas alterações,
                        disponível no site <a href="https://avicobrasil.com.br/" target="_blank">www.avico.com.br</a>,
                        do qual
                        declaro, por
                        meio deste termo, ter total
                        conhecimento e me comprometo a respeitar todas as suas disposições.
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
                <input id="termos" name="termos" class="form-check-input" type="checkbox" wire:model="termos">
                <label for="termos" class="form-check-label">Concorda com os termos de associação?*</label>
                <x-error-message errorName="termos" />
            </div>
        @endif
        @if ($currentStep == 3)
            <div class="row">
                <div class="mb-3 form-group col">
                    <label for="nome">Nome completo*</label>
                    <input class="form-control text-break" type="text" name="nome" wire:model="nome"
                        id="nome">
                    <x-error-message errorName="nome" />
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="dataNascimento">Data de Nascimento*</label>
                    <input class="form-control" type="date" name="dataNascimento" wire:model="dataNascimento"
                        id="dataNascimento">
                    <x-error-message errorName="dataNascimento" />
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="password">Digite sua senha*</label>
                    <input class="password form-control" type="password" name="password" wire:model="password"
                        id="password">
                    <x-error-message errorName="password" />
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="confirmPassword">Confirmar senha*</label>
                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword"
                        wire:model="confirmPassword">
                    <x-error-message errorName="confirmPassword" />
                </div>
                <div class="mb-3 form-group">
                    <label class="form-check-label text-start">Gênero*</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                            id="masculino" value="Masculino">
                        <label class="form-check-label" for="masculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                            id="feminino" value="Feminino">
                        <label class="form-check-label" for="feminino">Feminino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                            id="nao_binario" value="Não-binário">
                        <label class="form-check-label" for="nao_binario">Não-binário</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                            id="neutro" value="Neutro">
                        <label class="form-check-label" for="neutro">Prefiro Não Definir</label>
                    </div>
                    <x-error-message errorName="genero" />
                </div>
                <div class="mb-3 form-group">
                    <label for="racaCor">Raça/Cor*</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor" wire:model="racaCor"
                            id="branca" value="Branca">
                        <label class="form-check-label" for="branca">Branca</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor" wire:model="racaCor"
                            id="Preta" value="Preta">
                        <label class="form-check-label" for="preta">Preta</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor" wire:model="racaCor"
                            id="parda" value="Parda">
                        <label class="form-check-label" for="parda">Parda</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor" wire:model="racaCor"
                            id="indigena" value="Indígena">
                        <label class="form-check-label" for="indigena">Indígena</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor" wire:model="racaCor"
                            id="amarela" value="Amarela">
                        <label class="form-check-label" for="amarela">Amarela </label>
                    </div>
                    <x-error-message errorName="racaCor" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="cpf">CPF*</label>
                    <input class="form-control" type="text" name="cpf" wire:model.lazy="cpf"
                        id="cpf" maxlength="14" required>
                    <x-error-message errorName="cpf" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="rg">RG*</label>
                    <input class="form-control" type="text" name="rg" wire:model="rg" id="rg"
                        maxlength="14" required>
                    <x-error-message errorName="rg" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="celular">Celular (DDD+número)*</label>
                    <input class="form-control" type="text" name="celular" wire:model="celular" id="celular"
                        maxlength="18" required>
                    <x-error-message errorName="celular" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="telefoneResidencial">Telefone residencial (DDD+número)</label>
                    <input class="form-control" type="text" name="telefoneResidencial"
                        wire:model="telefoneResidencial" id="telefoneResidencial">
                    <x-error-message errorName="telefoneResidencial" />
                </div>
                <div class="mb-3">
                    <label for="email">E-mail*</label>
                    <input class="form-control" type="email" placeholder="nome@exemplo.com" name="email"
                        id="email" wire:model="email">
                    <x-error-message errorName="email" />
                </div>
                <div class="mb-3 col-md-3">
                    <label for="cep">CEP*</label>
                    <input class="form-control" type="text" name="cep" id="cep" wire:model="cep"
                        maxlength="8">
                    <x-error-message errorName="cep" />
                </div>
                <div class="mb-3 col-md-7">
                    <label for="endereco">Endereço*</label>
                    <input class="form-control" type="text" name="endereco" id="endereco" wire:model="endereco"
                        id="endereco">
                    <x-error-message errorName="endereco" />
                </div>
                <div class="mb-3 col-md-2">
                    <label for="nrmEndereco">Nº*</label>
                    <input class="form-control" type="number" name="nmrEndereco" id="nrmEndereco"
                        wire:model="nmrEndereco">
                    <x-error-message errorName="nmrEndereco" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="cidade">Cidade*</label>
                    <input class="form-control" type="text" name="cidade" wire:model="cidade" id="cidade">
                    <x-error-message errorName="telefone_residencial" />
                </div>
                <div class="mb-3 col-md-2">
                    <label for="uf">UF*</label>
                    <select class="form-select" name="uf" id="uf" wire:model="uf" aria-label="AC">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                    <x-error-message errorName="uf" />
                </div>
                <div class="mb-3 col-md-4">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="complemento" id="complemento"
                        wire:model="complemento" id="complemento">
                </div>
                <div class="mb-3">
                    <label for="bairro">Bairro*</label>
                    <input class="form-control" type="text" name="bairro" id="bairro" wire:model="bairro"
                        id="bairro">
                    <x-error-message errorName="bairro" />
                </div>
                <div class="mb-3 ">
                    <label for="profissao">Profissão*</label>
                    <input class="form-control" type="text" name="profissao" id="profissao"
                        wire:model="profissao">
                    <x-error-message errorName="profissao" />
                </div>
                <div class="form-group mb-3">
                    <label>Qual sua condição para se tornar associado?*</label>
                    <div class="form-check">
                        <label for="sobrevivente">Sobrevivente da COVID-19</label>
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            {{ in_array('Nenhuma das alternativas acima', $this->condicoes) ? 'disabled' : '' }}
                            id="sobrevivente" wire:model="condicoes" value="Sobrevivente da COVID-19" />
                    </div>
                    <div class="form-check">
                        <label for="familiar">Familiar de vítima da COVID-19</label>
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            {{ in_array('Nenhuma das alternativas acima', $this->condicoes) ? 'disabled' : '' }}
                            id="familiar" wire:model="condicoes" value="Familiar de vítima da COVID-19">
                    </div>
                    <div class="form-check">
                        <label for="nenhuma">Nenhuma das alternativas acima</label>
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            {{ in_array('Sobrevivente da COVID-19', $this->condicoes) ? 'disabled' : '' }}
                            {{ in_array('Familiar de vítima da COVID-19', $this->condicoes) ? 'disabled' : '' }}
                            id="nenhum" wire:model="condicoes" value="Nenhuma das alternativas acima">
                    </div>
                    <x-error-message errorName="condicoes" />
                </div>
                @if (in_array('Familiar de vítima da COVID-19', $this->condicoes))
                    <div class="mb-3">
                        <label> Informe no campo abaixo quantas pessoas do seu grupo familiar nuclear você
                            perdeu para a COVID-19 (mãe, pai,
                            filho, filha, avô, avó, pais, cônjuges). Clique no icone de + para adicionar um
                            novo campo (Máx 10) </label>
                        @foreach ($dadosAdicionais as $key => $input)
                            @if ($key === 0)
                                <button type="button" class="btn btn-primary mt-4" id="add_form_field"
                                    wire:click="addInput()"><i class="fa-solid fa-plus"></i>Adicionar novo
                                    famliar</button>
                            @endif
                            <div class="card mt-3">
                                <h5 class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <span class="title p-1">
                                            Familiar {{ $key + 1 }}
                                        </span>
                                        @if ($key > 0)
                                            <div class="p-1">
                                                <button type="button" class="btn-sm btn-danger"
                                                    id="remove_form_field"
                                                    wire:click="removeInput({{ $key }})"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                </h5>
                                <div class="card-body row py-0">
                                    <div class="form-group mb-3 col-md-4">
                                        <label for="dadosAdicionais_{{ $key }}_nome">Nome
                                            Completo</label>
                                        <input class="form-control" type="text" name="test"
                                            id="dadosAdicionais_{{ $key }}_nome"
                                            wire:model.defer="dadosAdicionais.{{ $key }}.nome">
                                        <x-error-message errorName="dadosAdicionais.{{ $key }}.nome" />
                                    </div>
                                    <div class="form-group mb-3 col-md-6">
                                        <label for="dadosAdicionais_{{ $key }}_parentesco">Grau de
                                            parentesco*</label>
                                        <select class="parentesco form-select" name="parentesco"
                                            wire:model="dadosAdicionais.{{ $key }}.parentesco"
                                            id="dadosAdicionais_{{ $key }}_parentesco" required>
                                            <option value="Cônjuge ou companheiro(a)">Cônjuge ou companheiro(a)
                                            </option>
                                            <option value="1º grau em linha reta (pai/mãe, filho/filha)">1º grau em
                                                linha reta (pai/mãe, filho/filha)
                                            </option>
                                            <option value="2º grau em linha reta (avô/avó, neto/neta)">2º grau em linha
                                                reta (avô/avó, neto/neta)
                                            </option>
                                            <option value="3º grau em linha colateral (tio/tia, sobrinho/sobrinha)">3º
                                                grau em linha colateral (tio/tia, sobrinho/sobrinha)</option>
                                            <option value="outro">Outro</option>
                                        </select>
                                        <x-error-message errorName="dadosAdicionais.{{ $key }}.parentesco" />
                                    </div>
                                    <div class="form-group mb-3 col-md-2">
                                        <label for="dadosAdicionais_{{ $key }}_idade">idade</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="idade"
                                                id="dadosAdicionais.{{ $key }}.idade"
                                                wire:model.defer="dadosAdicionais.{{ $key }}.idade">
                                        </div>
                                        <x-error-message errorName="dadosAdicionais.{{ $key }}.idade" />
                                    </div>
                                    @if ($this->dadosAdicionais[$key]['parentesco'] === 'outro')
                                        <div class="form-group mb-3 col">
                                            <label for="dadosAdicionais_{{ $key }}_outro">Outro tipo de
                                                parentesco</label>
                                            <input class="form-control" type="text" name="outro"
                                                id="dadosAdicionais.{{ $key }}.outro"
                                                wire:model.defer="dadosAdicionais.{{ $key }}.outro">
                                            <x-error-message errorName="dadosAdicionais.{{ $key }}.outro" />
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
        @if ($currentStep == 4)
            <div class="mb-3">
                <p class="text-justify">1. Tornando-se associado, você está ciente do pagamento do valor de R$ 40,00
                    (quarenta reais)
                    mensais a título de contribuição à AVICO.
                </p>
                <label>O pagamento da mensalidade acima informada pordera ser realizada da seguinte forma:</label>
                <div class="form-check mb-2">
                    @foreach (\App\Enums\PaymentTypes::cases() as $key => $value)
                        <br>
                        <label class="form-check-label" for="{{ $value->name }}">{{ $value->name }}</label>
                        <input class="pagamento form-check-input" type="radio" name="pagamento"
                            id="{{ $value->value }}" value="{{ $value->value }}" wire:model="pagamento">
                    @endforeach
                    <x-error-message errorName="pagamento" />
                </div>
                <p class="text-justify mb-2">2. Os casos de isenção serão analisados pela Diretoria da AVICO, de acordo
                    com a
                    renda bruta
                    familiar do associado (renda bruta de até de 1,5 salário mínimo per capita) que deverá ser
                    comprovada pelo
                    envio de documentos que demonstrem a renda.</p>
                <div class="form-check">
                    <input name="declaracaoIsencao" id="declaracaoIsencao" class="form-check-input"
                        wire:model="declaracaoIsencao" type="checkbox">
                    <label class="form-check-label" for="declaracaoIsencao">Declaro não ter condições de arcar com as
                        mensalidades da AVICO, e solicito análise socio econômica familia pela diretoria da
                        AVICO.</label>
                </div>
            </div>
        @endif
        @if ($currentStep == 5)
            <div class="mb-3">
                <p class="text-justify">1. Estou de acordo e entendo que devo encaminhar os documentos abaixo
                    elecancados, em boa
                    ordem,
                    legíveis e
                    digitalizados, sob pena de indeferimento imediato do requerimento.
                </p>
                <p class="text-justify">2. Para gerar o termo para a assinatura clique no botão indicado:
                    <a type="button" target="_blank" class="btn btn-primary mb-2 rounded-pill" id="gerar_pdf"
                        wire:click="generate_pdf()">Gerar termo</a>
                    . Caso seja necessario pode ser assinado digitalmente via <a
                        href="https://sso.acesso.gov.br/login?client_id=assinador.iti.br&authorization_id=1844e5391cc">site
                        do GOV.</a>
                </p>
                <div class="form-goup mb-3" id="termo_inscricao">
                    <label class="form-label" for="termo_inscrição">Termo de inscrição AVICO*</label>
                    <input class="form-control" type="file" name="filenames[]" id="termo_inscricao"
                        accept="application/pdf" wire:model="termoInscricao">
                    <x-error-message errorName="termoInscricao" />
                </div>
                <div class="form-goup mb-3" id="rgCPF">
                    <label class="form-label" for="cpf_rg">CPF/RG*</label>
                    <input class="form-control" type="file" name="filenames[]" wire:model="fileCpfRg"
                        id="cpf_rg" accept="image/.jpg,.png,.jpeg" multiple>
                    <x-error-message errorName="fileCpfRg" />
                </div>
                @if (in_array('Sobrevivente da COVID-19', $this->condicoes))
                    <div class="form-goup mb-3" id="comprovante">
                        <label class="form-label" for="comprovanteMedico">Cópia de Comprovante Médico de
                            existência de sequelas da COVID-19 (em caso de sobrevivente)*
                        </label>
                        <input class="form-control" type="file" name="filenames[]" wire:model="fileComprovante"
                            id="comprovanteMedico" accept="image/.jpg,.png,.jpeg" multiple>
                        <x-error-message errorName="fileComprovante" />
                    </div>
                @endif
                @if (in_array('Familiar de vítima da COVID-19', $this->condicoes))
                    <div class="form-goup mb-3" id="certidao_obito">
                        <label class="form-label" for="certidaoObito">Cópia da Certidão de Óbito da vítima (em
                            caso de familiar de vítima)*
                        </label>
                        <input class="form-control" type="file" name="filenames[]" wire:model="fileCertidaoObito"
                            id="certidaoObito" accept="image/.jpg,.png,.jpeg" multiple>
                        <x-error-message errorName="fileCertidaoObito" />
                    </div>
                @endif
                <div class="form-goup mb-3" id="compEndereco">
                    <label class="form-label" for="comprovanteEndereco">Cópia de Comprovante de
                        Endereço*</label>
                    <input class="form-control" type="file" name="filenames[]"
                        wire:model="fileComprovanteEndereco" id="comprovanteEndereco" accept="image/.jpg,.png,.jpeg">
                    <x-error-message errorName="fileComprovanteEndereco" />
                </div>
                @if ($declaracaoIsencao)
                    <div class="form-goup mb-3" id="comprovante_isencao">
                        <label class="form-label" for="comprovanteRenda">Para casos de isenção de contribuição
                            (renda familiar bruta de até 1,5 salário mínimo per capita), cópia dos documentos
                            comprobatórios de
                            renda familiar. Ex: holerites dos membros da família ou outros documentos que comprovem a
                            renda familiar.
                        </label>
                        <input class="form-control" type="file" wire:model="fileComprovanteIsencao"
                            name="filenames[]" id="comprovanteRenda" accept="image/.jpg,.png,.jpeg" multiple>
                        <x-error-message errorName="fileComprovanteIsencao" />
                    </div>
                @endif
            </div>
        @endif
        <div class="form-navigation gap-1 d-flex d-flex justify-content-between">
            @if ($currentStep > 1)
                <button type="button" class="btn btn-info float-left mr-5 rounded"
                    wire:click="decreaseStep()">Anterior</button>
            @endif
            @if ($currentStep != $totalSteps)
                <button type="button" class="btn btn-info float-right mr-5 rounded"
                    wire:click="increaseStep()">Proximo</button>
            @endif
            @if ($currentStep == 5)
                <button type="button" class="btn btn-success float-right mr-5 rounded"
                    wire:click="sendInfos()">Enviar</button>
            @endif
        </div>
    </form>
</div>
