<div>
    @include('messages.messages')
    <h1 class="text-center">Formulário de Cadastro Avico</h1>
    <x-alert alertType="warning" dismissible='false'
        message="Os campos destacados com * indicam que são Obrigatórios !!" />
    <form class="form-cadastro" wire:submit.prevent="submit" enctype="multipart/form-data"
        @foreach ($errors as $key => $error)
            data-target="{{ $key }}"
            @break @endforeach
        data-offset="0">
        @csrf
        @if ($currentStep == 1)
            <div class="form-check">
                <label class="mb-2">Deseja se tornar:*</label>
                @foreach (\App\Enums\UserType::cases() as $key => $value)
                    <br>
                    <input class="tipo form-check-input" type="checkbox" name="tipo[]" wire:model="data.tipo"
                        id="{{ $value->value }}" value="{{ $value->value }}">
                    <label class="form-check-label" for="{{ $value->name }}"> {{ $value->name }}</label>
                @endforeach
                <x-error-message errorName="data.tipo" />
            </div>
        @endif
        @if ($currentStep == 2)
            <div class="form-check">
                <div class="text-sm-start fw-bold" id="termos_associacao">
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
                <label for="termos" class="form-check-label">Concorda com os termos de associação?*</label>
                <input id="termos" name="termos" class="form-check-input" type="checkbox" wire:model="data.termos">
                <x-error-message errorName="data.termos" />
            </div>
        @endif
        @if ($currentStep == 3)
            <div class="row">
                <div class="mb-3 form-group col">
                    <label for="nome">Nome completo*</label>
                    <input class="form-control text-break @error('data.nome') is-invalid @enderror" name="nome"
                        wire:model="data.nome" value="{{ 'data.nome' }}" id="nome" maxlength="255">
                    <x-error-message errorName="data.nome" />
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="dataNascimento">Data de Nascimento*</label>
                    <input class="form-control" type="date" name="dataNascimento" wire:model="data.dataNascimento"
                        id="dataNascimento">
                    <x-error-message errorName="data.dataNascimento" />
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="password">Digite sua senha*</label>
                    <input class="password form-control" type="password" name="password" wire:model="data.password"
                        id="password">
                    <x-error-message errorName="data.password" />
                </div>
                <div class="mb-3 form-group col-md-6">
                    <label for="confirmPassword">Confirmar senha*</label>
                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword"
                        wire:model="data.confirmPassword">
                    <x-error-message errorName="data.confirmPassword" />
                </div>
                <div class="mb-3 form-group">
                    <label class="form-check-label text-start">Gênero*</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="data.genero"
                            id="masculino" value="Masculino">
                        <label class="form-check-label" for="masculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="data.genero"
                            id="feminino" value="Feminino">
                        <label class="form-check-label" for="feminino">Feminino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="data.genero"
                            id="nao_binario" value="Não-binário">
                        <label class="form-check-label" for="nao_binario">Não-binário</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="genero form-check-input" type="radio" name="genero" wire:model="data.genero"
                            id="neutro" value="Neutro">
                        <label class="form-check-label" for="neutro">Prefiro Não Definir</label>
                    </div>
                    <x-error-message errorName="data.genero" />
                </div>
                <div class="mb-3 form-group">
                    <label for="racaCor">Raça/Cor*</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor"
                            wire:model="data.racaCor" id="branca" value="Branca">
                        <label class="form-check-label" for="branca">Branca</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor"
                            wire:model="data.racaCor" id="preta" value="Preta">
                        <label class="form-check-label" for="preta">Preta</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor"
                            wire:model="data.racaCor" id="parda" value="Parda">
                        <label class="form-check-label" for="parda">Parda</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor"
                            wire:model="data.racaCor" id="indigena" value="Indígena">
                        <label class="form-check-label" for="indigena">Indígena</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="racaCor form-check-input" type="radio" name="racaCor"
                            wire:model="data.racaCor" id="amarela" value="Amarela">
                        <label class="form-check-label" for="amarela">Amarela </label>
                    </div>
                    <x-error-message errorName="data.racaCor" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="cpf">CPF*</label>
                    <input class="form-control" type="text" name="cpf" wire:model.lazy="data.cpf"
                        id="cpf" maxlength="14" required>
                    <x-error-message errorName="data.cpf" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="rg">RG*</label>
                    <input class="form-control" type="text" name="rg" wire:model="data.rg" id="rg"
                        maxlength="14" required>
                    <x-error-message errorName="data.rg" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="celular">Celular (DDD+número)*</label>
                    <input class="form-control" type="text" name="celular" wire:model="data.celular"
                        id="celular" maxlength="18" required>
                    <x-error-message errorName="data.celular" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="telefoneResidencial">Telefone residencial (DDD+número)</label>
                    <input class="form-control" type="text" name="telefoneResidencial"
                        wire:model="data.telefoneResidencial" id="telefoneResidencial">
                    <x-error-message errorName="data.telefoneResidencial" />
                </div>
                <div class="mb-3">
                    <label for="email">E-mail*</label>
                    <input class="form-control" type="email" placeholder="nome@exemplo.com" name="email"
                        id="email" wire:model="data.email">
                    <x-error-message errorName="data.email" />
                </div>
                <div class="mb-3 col-md-3">
                    <label for="cep">CEP*</label>
                    <input class="form-control" type="text" name="cep" id="cep"
                        wire:model.lazy="data.cep" maxlength="8">
                    <x-error-message errorName="data.cep" />
                </div>
                <div class="mb-3 col-md-7">
                    <label for="endereco">Endereço*</label>
                    <input class="form-control" type="text" name="endereco" id="endereco"
                        wire:model="data.endereco">
                    <x-error-message errorName="data.endereco" />
                </div>
                <div class="mb-3 col-md-2">
                    <label for="nrmEndereco">Nº*</label>
                    <input class="form-control" type="number" name="nmrEndereco" id="nrmEndereco"
                        wire:model="data.nmrEndereco">
                    <x-error-message errorName="data.nmrEndereco" />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="cidade">Cidade*</label>
                    <input class="form-control" type="text" name="cidade" wire:model="data.cidade"
                        id="cidade">
                    <x-error-message errorName="data.cidade" />
                </div>
                <div class="mb-3 col-md-2">
                    <label for="uf">UF*</label>
                    <select class="form-select" name="uf" id="uf" wire:model="data.uf" aria-label="AC">
                        @foreach (\App\Models\Uf::all() as $uf)
                            <option>{{ $uf->sigla }}</option>
                        @endforeach
                    </select>
                    <x-error-message errorName="data.uf" />
                </div>
                <div class="mb-3 col-md-4">
                    <label for="complemento">Complemento</label>
                    <input class="form-control" type="text" name="complemento" id="complemento"
                        wire:model="data.complemento">
                </div>
                <div class="mb-3">
                    <label for="bairro">Bairro*</label>
                    <input class="form-control" type="text" name="bairro" id="bairro"
                        wire:model="data.bairro">
                    <x-error-message errorName="data.bairro" />
                </div>
                <div class="mb-3 ">
                    <label for="profissao">Profissão*</label>
                    <input class="form-control" type="text" name="profissao" id="profissao"
                        wire:model="data.profissao" maxlength="255">
                    <x-error-message errorName="data.profissao" />
                </div>
                <div class="form-group mb-3">
                    <label>Qual sua condição para se tornar associado?*</label>
                    <div class="form-check">
                        <label for="sobrevivente">Sobrevivente da COVID-19</label>
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            @disabled(in_array('Nenhuma das alternativas acima', $this->data['condicoes'])) id="sobrevivente" wire:model="data.condicoes"
                            value="Sobrevivente da COVID-19" />
                    </div>
                    <div class="form-check">
                        <label for="familiar">Familiar de vítima da COVID-19</label>
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            @disabled(in_array('Nenhuma das alternativas acima', $this->data['condicoes'])) id="familiar" wire:model="data.condicoes"
                            value="Familiar de vítima da COVID-19">
                    </div>
                    <div class="form-check">
                        <label for="nenhum">Nenhuma das alternativas acima</label>
                        <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                            @disabled(in_array('Sobrevivente da COVID-19', $this->data['condicoes']) ||
                                    in_array('Familiar de vítima da COVID-19', $this->data['condicoes'])) id="nenhum" wire:model="data.condicoes"
                            value="Nenhuma das alternativas acima">
                    </div>
                    <x-error-message errorName="data.condicoes" />
                </div>
                @if (in_array('Familiar de vítima da COVID-19', $this->data['condicoes']))
                    <div class="mb-3">
                        <label> Informe nos campos abaixo quantas pessoas do seu grupo familiar nuclear você
                            perdeu para a COVID-19 (mãe, pai,
                            filho, filha, avô, avó, pais, cônjuges). Clique no icone de + para adicionar um
                            novo campo (Máx 10) </label>
                        @foreach ($this->data['dadosAdicionais'] as $key => $input)
                            @if ($key === 0)
                                <button type="button" class="btn btn-primary mt-4" id="add_form_field"
                                    wire:click="addInput()"><i class="fa-solid fa-plus"></i>Adicionar novo
                                    familiar
                                </button>
                            @endif
                            <div class="card mt-3 mb-2">
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
                                            wire:model.defer="data.dadosAdicionais.{{ $key }}.nome"
                                            maxlength="255">
                                        <x-error-message errorName="data.dadosAdicionais.{{ $key }}.nome" />
                                    </div>
                                    <div class="form-group mb-3 col-md-6">
                                        <label for="dadosAdicionais_{{ $key }}_parentesco">Grau de
                                            parentesco*</label>
                                        <select class="parentesco form-select" name="parentesco"
                                            wire:model="data.dadosAdicionais.{{ $key }}.parentesco"
                                            id="dadosAdicionais_{{ $key }}_parentesco" required>
                                            <option value="Cônjuge ou companheiro(a)">Cônjuge ou companheiro(a)
                                            </option>
                                            <option value="1º grau em linha reta (pai/mãe, filho/filha)">1º grau em
                                                linha reta (pai/mãe, filho/filha)
                                            </option>
                                            <option value="2º grau em linha colateral (irmão/irmâ)">2º grau em
                                                linha colateral
                                                (irmão/irmâ)
                                            </option>
                                            <option value="2º grau em linha reta (avô/avó, neto/neta)">2º grau em linha
                                                reta
                                                (avô/avó,
                                                neto/neta)
                                            </option>
                                            <option value="3º grau em linha colateral (tio/tia, sobrinho/sobrinha)">3º
                                                grau em linha colateral (tio/tia, sobrinho/sobrinha)
                                            </option>
                                            <option value="outro">Outro</option>
                                        </select>
                                        <x-error-message
                                            errorName="data.dadosAdicionais.{{ $key }}.parentesco" />
                                    </div>
                                    <div class="form-group mb-3 col-md-2">
                                        <label for="dadosAdicionais.{{ $key }}.idade">idade</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="idade"
                                                id="dadosAdicionais.{{ $key }}.idade"
                                                wire:model.defer="data.dadosAdicionais.{{ $key }}.idade">
                                        </div>
                                        <x-error-message errorName="dadosAdicionais.{{ $key }}.idade" />
                                    </div>
                                    @if ($this->data['dadosAdicionais'][$key]['parentesco'] === 'outro')
                                        <div class="form-group mb-3 col">
                                            <label for="dadosAdicionais.{{ $key }}.outro">Outro tipo de
                                                parentesco</label>
                                            <input class="form-control" type="text" name="outro"
                                                id="dadosAdicionais.{{ $key }}.outro"
                                                wire:model.defer="data.dadosAdicionais.{{ $key }}.outro"
                                                maxlength="255">
                                            <x-error-message
                                                errorName="data.dadosAdicionais.{{ $key }}.outro" />
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
                <p class="text-justify">1. Tornando-se associado, você está ciente do pagamento do valor de R$
                    40,00
                    (quarenta reais)
                    mensais a título de contribuição à AVICO.
                </p>
                <label>O pagamento da mensalidade acima informada pordera ser realizada da seguinte forma:</label>
                <div class="form-check mb-2">
                    @foreach (\App\Enums\PaymentType::cases() as $key => $value)
                        <br>
                        <label class="form-check-label" for="{{ $value->value }}">{{ $value->name }}</label>
                        <input class="pagamento form-check-input" type="radio" name="pagamento"
                            id="{{ $value->value }}" value="{{ $value->value }}" wire:model="data.pagamento">
                    @endforeach
                    <x-error-message errorName="data.pagamento" />
                </div>
                <p class="text-justify mb-2">2. Os casos de isenção serão analisados pela Diretoria da AVICO, de
                    acordo
                    com a
                    renda bruta
                    familiar do associado (renda bruta de até de 1,5 salário mínimo per capita) que deverá ser
                    comprovada pelo
                    envio de documentos que demonstrem a renda.</p>
                <div class="form-check">
                    <input name="declaracaoIsencao" id="declaracaoIsencao" class="form-check-input"
                        wire:model="data.declaracaoIsencao" type="checkbox">
                    <label class="form-check-label" for="declaracaoIsencao">Declaro não ter condições de arcar com
                        as
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
                        wire:click="generate_pdf">Gerar termo</a>
                    . Caso seja necessario pode ser assinado digitalmente via <a
                        href="https://sso.acesso.gov.br/login?client_id=assinador.iti.br&authorization_id=1844e5391cc">
                        site do GOV.</a>
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
                @if (in_array('Sobrevivente da COVID-19', $this->data['condicoes']))
                    <div class="form-group mb-3" id="comprovante">
                        <label class="form-label" for="comprovanteMedico">Cópia de Comprovante Médico de
                            existência de sequelas da COVID-19 (em caso de sobrevivente)*
                        </label>
                        <input class="form-control" type="file" name="filenames[]" wire:model="fileComprovante"
                            id="comprovanteMedico" accept="image/.jpg,.png,.jpeg" multiple>
                        <x-error-message errorName="fileComprovante" />
                    </div>
                @endif
                @if (in_array('Familiar de vítima da COVID-19', $this->data['condicoes']))
                    <div class="form-group mb-3" id="certidao_obito">
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
                @if ($this->data['declaracaoIsencao'])
                    <div class="form-group mb-3" id="comprovante_isencao">
                        <label class="form-label" for="comprovanteRenda">Para casos de isenção de contribuição
                            (renda familiar bruta de até 1,5 salário mínimo per capita), cópia dos documentos
                            comprobatórios de
                            renda familiar. Ex: holerites dos membros da família ou outros documentos que comprovem
                            a
                            renda familiar.
                        </label>
                        <input class="form-control" type="file" wire:model="fileComprovanteIsencao"
                            name="filenames[]" id="comprovanteRenda" accept="image/.jpg,.png,.jpeg" multiple>
                        <x-error-message errorName="fileComprovanteIsencao" />
                    </div>
                @endif
            </div>
        @endif
        <div class="form-navigation d-flex justify-content-between mt-2">
            @if ($currentStep > 1)
                <button type="button" class="btn btn-info rounded" wire:click="decreaseStep">Anterior
                </button>
            @endif
            @if ($currentStep != $totalSteps)
                <button type="button" class="btn btn-info rounded" wire:click="increaseStep">Próximo
                </button>
            @endif
            @if ($currentStep == $totalSteps)
                <button type="button" class="btn btn-success rounded" wire:click="sendInfos"
                    wire:loading.attr="disabled">Enviar
                </button>
            @endif
        </div>
    </form>
</div>
