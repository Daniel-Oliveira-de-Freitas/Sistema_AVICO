<div>
    @if (session('success'))
        @include(session('success'))
    @elseif(session('fail'))
        @include(session('fail'))
    @endif
    <h1 class="text-center">Formulário de Cadastro Avico</h1>
    <div class="card-body">
        <p class="text-center">Os campos destacados com * indicam que são Obrigatórios !!</p>

        <form action="{{ route('inscricao.store') }}" method="POST" class="form-cadastro" enctype="multipart/form-data">
            @csrf
            @if ($currentStep == 1)
                <div div class="form-content mb-3">
                    <label class="mb-2">Deseja se tornar:*</label>
                    @foreach (\App\Enums\UserTypes::cases() as $key => $value)
                        <br>
                        <input class="tipo form-check-input" type="checkbox" name="tipo[]" wire:model="tipo"
                            id="{{ $value->value }}" value="{{ $value->value }}" data-parsley-required
                            data-parsley-mincheck="1" data-parsley-required-message="Você deve selecionar uma opção">
                        <label class="form-check-label" for="{{ $value->name }}"> {{ $value->name }}</label>
                    @endforeach
                    <div class="mt-3">
                        <span class="text-danger">
                            @error('tipo')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            @endif
            @if ($currentStep == 2)
                <div class="form-content">
                    <div class="form-group text-sm-start form-check">

                        <h1 class="text-center">TERMO DE ASSOCIAÇÃO</h1>
                        <p> 1. Os dados fornecidos serão utilizados exclusivamente pela nossa Associação, sendo
                            vedado o
                            uso
                            para fins
                            diversos, seguindo a Lei Geral Proteção de Dados LEI Nº 13.709, DE 14 DE AGOSTO DE 2018.
                        </p>
                        <p>
                            2. Venho, através do preenchimento dos dados solicitados neste Termo de Associação,
                            requerer a admissão como Associado da AVICO – Associação de Vítimas e Familiares de vítimas
                            de COVID-19,
                            inscrita no CNPJ sob nº 42.900.150/0001-00, com sede na Avenida Praia de Belas, nº 454, apto
                            201, Praia de
                            Belas, CEP 90110-000, Porto Alegre/RS, de acordo com o artigo 27, parágrafo segundo, do
                            Estatuto e suas alterações,
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

                    <input id="termos" name="termos" class=" form-check-input" type="checkbox" wire:model="termos">
                    <label for="termos">Concorda com os termos de associação?*</label>
                    <div class="mt-3">
                        <span class="text-danger">
                            @error('termos')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            @endif
            @if ($currentStep == 3)
                <div class="form-content">
                    <div class="row">
                        <div class="mb-3 form-group col">
                            <label>Nome completo*</label>
                            <input class="form-control form-control text-break" type="text" name="nome"
                                wire:model="nome" id="nome">
                            <div class="mt-3">
                                <span class="text-danger">
                                    @error('nome')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 form-group col-md-6">
                            <label>Data de Nascimento*</label>
                            <input class="form-control" type="date" name="dataNascimento" wire:model="dataNascimento"
                                id="dataNascimento">
                            <div class="mt-3">
                                <span class="text-danger">
                                    @error('dataNascimento')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="senha">Digite sua senha*</label>
                            <input class="password form-control" type="password" name="password" wire:model="password"
                                id="password">
                            <span id='message_password'></span>
                            <div class="mt-3">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="senha">Confirmar senha*</label>
                            <input class="form-control" type="password" id="confirmPassword"
                                wire:model="confirmPassword">
                            <div class="mt-3">
                                <span class="text-danger">
                                    @error('confirmPassword')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 form-group">
                            <label>Gênero*</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">Masculino</label>
                                <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                                    id="masculino" value="Masculino">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                                    id="feminino" value="Feminino">
                                <label class="form-check-label">Feminino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                                    id="nao_binario" value="Não-binário">
                                <label class="form-check-label">Não-binário</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="genero form-check-input" type="radio" name="genero" wire:model="genero"
                                    id="neutro" value="Neutro" data-parsley-required data-parsley-mincheck="1"
                                    data-parsley-required-message="Você deve selecionar uma opção">
                                <label class="form-check-label">Prefiro Não Definir</label>
                            </div>
                            <div class="mt-3">
                                <span class="text-danger">
                                    @error('genero')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3 form-group">
                            <label>Raça/Cor*</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">Branca</label>
                                <input class="raca_cor form-check-input" type="radio" name="raca_cor"
                                    wire:model="raca_cor" id="branca" value="Branca">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="raca_cor form-check-input" type="radio" name="raca_cor"
                                    wire:model="raca_cor" id="Preta" value="Preta">
                                <label class="form-check-label">Preta</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="genero form-check-input" type="radio" name="raca_cor"
                                    wire:model="raca_cor" id="parda" value="Parda">
                                <label class="form-check-label">Parda</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="raca_cor form-check-input" type="radio" name="raca_cor"
                                    wire:model="raca_cor" id="indigena" value="Indígena">
                                <label class="form-check-label">Indígena</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="raca_cor form-check-input" type="radio" name="raca_cor"
                                    wire:model="raca_cor" id="amarela" value="Amarela " data-parsley-required
                                    data-parsley-mincheck="1"
                                    data-parsley-required-message="Você deve selecionar uma opção">
                                <label class="form-check-label">Amarela </label>
                            </div>
                            <div class="mt-3"><span class="text-danger">
                                    @error('raca_cor')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>CPF*</label>
                            <input class="form-control" type="text" name="cpf" wire:model.lazy="cpf"
                                id="cpf" data-parsley-minlength="10" maxlength="14"
                                data-parsley-minlength-message="Insira um CPF válido." required>
                            <div class="mt-3"><span class="text-danger">
                                    @error('cpf')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>RG*</label>
                            <input class="form-control" type="text" name="rg" wire:model="rg"
                                id="rg" maxlength="14" required>
                            <div class="mt-3"><span class="text-danger">
                                    @error('rg')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Celular (DDD+número)*</label>
                            <input class="form-control" type="tel" name="celular" wire:model="celular"
                                id="celular" maxlength="18" required>
                            <div class="mt-3"><span class="text-danger">
                                    @error('celular')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Telefone residencial (DDD+número)</label>
                            <input class="form-control" type="tel" name="telefone_residencial"
                                wire:model="telefone_residencial" id="telefone_residencial"
                                data-parsley-minlength-message="Insira um numero de telefone residencial válido."
                                data-parsley-minlength="10" maxlength="18">
                            <span id="message_errorTelefoneResidencial" style="color: red; visibility:hidden;">Insira
                                um
                                numero de telefone residencial válido.</span>
                            <div class="mt-2"><span class="text-danger">
                                    @error('telefone_residencial')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3">
                            <label>E-mail*</label>
                            <input class="form-control" type="email" placeholder="nome@exemplo.com" name="email"
                                wire:model="email" required data-parsley-type-message="Email inválido">
                            <div class="mt-3"><span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label>CEP*</label>
                            <input class="form-control" type="text" name="cep" wire:model="cep"
                                id="cep" maxlength="8" required>
                            <div class="mt-2"><span class="text-danger">
                                    @error('cep')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-7">
                            <label>Endereço*</label>
                            <input class="form-control" type="text" name="endereco" wire:model="endereco"
                                id="endereco" required>
                            <div class="mt-2"><span class="text-danger">
                                    @error('endereco')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label>Nº*</label>
                            <input class="form-control" type="number" name="nmrEndereco" wire:model="nmrEndereco"
                                required>
                            <div class="mt-2"><span class="text-danger">
                                    @error('nmrEndereco')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>Cidade*</label>
                            <input class="form-control" type="text" name="cidade" wire:model="cidade"
                                id="cidade" required>
                            <div class="mt-2"><span class="text-danger">
                                    @error('cidade')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-2">
                            <label>UF*</label>
                            <select class="form-select form-select" name="uf" wire:model="uf" id="uf"
                                required>
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
                            <div class="mt-2"><span class="text-danger">
                                    @error('uf')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label>Complemento</label>
                            <input class="form-control" type="text" name="complemento" wire:model="complemento"
                                id="complemento">
                        </div>
                        <div class="mb-3">
                            <label>Bairro*</label>
                            <input class="form-control" type="text" name="bairro" wire:model="bairro"
                                id="bairro">
                            <div class="mt-2"><span class="text-danger">
                                    @error('bairro')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3 ">
                            <label>Profissão*</label>
                            <input class="form-select" type="text" name="profissao" wire:model="profissao">
                            <div class="mt-2"><span class="text-danger">
                                    @error('profissao')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        <div class="mb-3">
                            <label>Qual sua condição para se tornar associado?*</label>

                            <div class="form-check">
                                <label for="Sobrevivente da COVID-19">Sobrevivente da COVID-19</label>
                                <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                                    wire:model="condicoes" id="sobrevivente" value="Sobrevivente da COVID-19" />
                            </div>
                            <div class="form-check">
                                <label for="Familiar de vítima da COVID-19">Familiar de vítima da COVID-19</label>

                                <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                                    wire:model="condicoes" id="familiar" value="Familiar de vítima da COVID-19">
                            </div>
                            <div class="form-check">
                                <label for="Nenhuma das alternativas acima">Nenhuma das alternativas acima</label>

                                <input class="condicao form-check-input" type="checkbox" name="condicoes[]"
                                    wire:model="condicoes" id="nenhum" value="Nenhuma das alternativas acima">
                            </div>
                            <div class="mt-2"><span class="text-danger">
                                    @error('condicoes')
                                        {{ $message }}
                                    @enderror
                                </span></div>
                        </div>
                        @if (in_array('Familiar de vítima da COVID-19', $this->condicoes))
                            <div id="grauParentesco" class="mb-3">
                                <label>Qual o grau de parentesco com a vítima?*</label>
                                <select class="form-select parentesco" name="parentesco" wire:model="parentesco"
                                    id="parentesco" required>
                                    <option value="Cônjuge ou companheiro(a)">Cônjuge ou companheiro(a)</option>
                                    <option value="1º grau em linha reta (pai/mãe, filho/filha)">1º grau em linha reta
                                        (pai/mãe,
                                        filho/filha)</option>
                                    <option value="2º grau em linha reta (avô/avó, neto/neta)">2º grau em linha reta
                                        (avô/avó,
                                        neto/neta)
                                    </option>
                                    <option value="3º grau em linha colateral (tio/tia, sobrinho/sobrinha)">3º grau em
                                        linha
                                        colateral (tio/tia, sobrinho/sobrinha)</option>
                                    <option id="outros" value="outros">Outros</option>
                                </select>
                                <div class="mt-2"><span class="text-danger">
                                        @error('parentesco')
                                            {{ $message }}
                                        @enderror
                                    </span></div>
                                @if ($parentesco === 'outros')
                                    <div id="outrosInput mt-3">
                                        <span class="mt-3">Por favor, especifique no campo abaixo:*</span>
                                        <input class="outrosData form-control mt-3" name="outro"
                                            wire:model="outros" id="outrosData" type="text" required>
                                        <div class="mt-2"><span class="text-danger">
                                                @error('outros')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        <div class="mb-3">
                            <label> Informe no campo abaixo quantas pessoas do seu grupo familiar nuclear você perdeu
                                para a COVID-19 (mãe, pai,
                                filho, filha, avô, avó, pais, cônjuges). Clique no icone de + para adicionar um novo
                                campo (Máx 10) </label>
                            @foreach ($dadosAdicionais as $key => $input)
                                @if ($key === 0)
                                    <button type="button" class="btn btn-primary mt-4" id="add_form_field"
                                        wire:click="addInput()"><i class="fa-solid fa-plus"></i>Adicionar novo campo</button>
                                @endif
                                <div class="row mt-3">
                                    <div class="mb-3  col-md-4">
                                        <label for="dadosAdicionais_{{ $key }}_nome">Nome Completo</label>
                                        <input class="form-control" type="text" name="test"
                                            id="dadosAdicionais_{{ $key }}_nome"
                                            wire:model.defer="dadosAdicionais.{{ $key }}.nome">
                                        <div class="mt-2"><span class="text-danger">
                                                @error('dadosAdicionais.' . $key . '.nome')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="dadosAdicionais_{{ $key }}_parentesco">Grau de
                                            parentesco*</label>
                                        <select class="parentesco form-select" name="parentesco"
                                            wire:model.defer="dadosAdicionais.{{ $key }}.parentesco"
                                            id="dadosAdicionais_{{ $key }}_parentesco" required>
                                            <option value="Cônjuge ou companheiro(a)">Cônjuge ou companheiro(a)
                                            </option>
                                            <option value="1º grau em linha reta (pai/mãe, filho/filha)">1º grau em
                                                linha reta
                                                (pai/mãe,
                                                filho/filha)
                                            </option>
                                            <option value="2º grau em linha reta (avô/avó, neto/neta)">2º grau em linha
                                                reta
                                                (avô/avó, neto/neta)
                                            </option>
                                            <option value="3º grau em linha colateral (tio/tia, sobrinho/sobrinha)">3º
                                                grau em
                                                linha colateral (tio/tia, sobrinho/sobrinha)</option>
                                        </select>
                                        <div class="mt-2"><span class="text-danger">
                                                @error('dadosAdicionais.' . $key . '.parentesco')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                    <div class="mb-3 col-md-2">
                                        <label for="dadosAdicionais_{{ $key }}_idade">idade</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="idade"
                                                wire:model.defer="dadosAdicionais.{{ $key }}.idade"
                                                id="dadosAdicionais.{{ $key }}.idade">
                                            @if ($key > 0)
                                                <button type="button" class="btn-sm btn-danger"
                                                    id="remove_form_field"
                                                    wire:click="removeInput({{ $key }})"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            @endif
                                        </div>
                                        <div class="mt-2"><span class="text-danger">
                                                @error('dadosAdicionais.' . $key . '.idade')
                                                    {{ $message }}
                                                @enderror
                                            </span></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @if ($currentStep == 4)
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
                                id="{{ $value->value }}" value="{{ $value->value }}" wire:model="pagamento"
                                data-parsley-required
                                data-parsley-required-message="Você deve selecionar um tipo de pagamento">
                        @endforeach
                        <div class="mt-2"><span class="text-danger">
                                @error('pagamento')
                                    {{ $message }}
                                @enderror
                            </span></div>
                    </div>
                    <p class="mb-2">2. Os casos de isenção serão analisados pela Diretoria da AVICO, de acordo com a
                        renda bruta
                        familiar do associado (renda bruta de até de 1,5 salário mínimo per capita) que deverá ser
                        comprovada pelo
                        envio de documentos que demonstrem a renda.</p>

                    <input name="declaracao_isencao" id="declaracao_isencao" class="form-check-input"
                        wire:model="declaracao_isencao" onchange="comprovanteIsencaoInputShow()" type="checkbox">
                    <label for="declaracao">Declaro não ter condições de arcar com as mensalidades da AVICO, e solicito
                        analise socio economica familia pela diretoria da AVICO.</label>
                </div>
            @endif
            @if ($currentStep == 5)
                <div class="form-content mb-3">
                    <p>1. Estou de acordo e entendo que devo encaminhar os documentos abaixo elecancados, em boa ordem,
                        legíveis e
                        digitalizados, sob pena de indeferimento imediato do requerimento.
                    </p>
                    <p>2. Para gerar o termo para a assinatura clique no botão indicado:
                        <a type="button" target="_blank" wire:click="generate_array()" id="gerar_pdf"
                            class="btn btn-primary mb-2">Gerar termo</a>
                        . Caso seja necessario pode ser assinado digitalmente via <a
                            href="https://sso.acesso.gov.br/login?client_id=assinador.iti.br&authorization_id=1844e5391cc">
                            site do GOV.</a>
                    </p>
                    <div class="mb-3" id="termo_inscricao">
                        <label class="form-label" for="termo_inscrição">Termo de inscrição AVICO*</label>
                        <input class="form-control" type="file" name="filenames[]" onchange="fileValidation()"
                            id="termo_inscricao" accept="image/.jpg,.png,.jpeg" required>
                    </div>
                    <div class="mb-3" id="rgCPF">
                        <label class="form-label" for="Cópia do RG/CPF">CPF/RG*</label>
                        <input class="form-control" type="file" onchange="fileValidation()" name="filenames[]"
                            id="cpf_rg" accept="image/.jpg,.png,.jpeg" multiple required>
                    </div>
                    @if (in_array('Sobrevivente da COVID-19', $this->condicoes))
                        <div class="mb-3" id="comprovante">
                            <label class="form-label" for="">Cópia de Comprovante Médico de existência de
                                sequelas
                                da
                                COVID-19 (em caso de sobrevivente)*
                            </label>
                            <input class="form-control" type="file" name="filenames[]"
                                onchange="fileValidation()" id="comprovanteMedico" accept="image/.jpg,.png,.jpeg"
                                multiple required>
                        </div>
                    @endif
                    @if (in_array('Familiar de vítima da COVID-19', $this->condicoes))
                        <div class="mb-3" id="certidao_obito">
                            <label class="form-label" for="">Cópia da Certidão de Óbito da vítima (em caso de
                                familiar
                                de vítima)*
                            </label>
                            <input class="form-control" type="file" name="filenames[]"
                                onchange="fileValidation()" id="certidaoObito" accept="image/.jpg,.png,.jpeg"
                                multiple required>
                        </div>
                    @endif

                    <div class="mb-3" id="compEndereco">
                        <label class="form-label" for="">Cópia de Comprovante de Endereço*</label>
                        <input class="form-control" type="file" name="filenames[]" onchange="fileValidation()"
                            id="comprovanteEndereco" accept="image/.jpg,.png,.jpeg" multiple required>
                    </div>
                    @if ($declaracao_isencao)
                        <div class="mb-3" id="comprovante_isencao">
                            <label class="form-label" for="">Para casos de isenção de contribuição (renda
                                familiar
                                bruta de até 1,5 salário mínimo per capita), cópia dos documentos comprobatórios de
                                renda
                                familiar. Ex: holerites dos membros da família ou outros documentos que comprovem a
                                renda
                                familiar.
                            </label>
                            <input class="form-control" type="file" onchange="fileValidation()"
                                name="filenames[]" id="comprovanteRenda" accept="image/.jpg,.png,.jpeg" multiple>
                        </div>
                    @endif
                </div>
            @endif
            <div class="form-navigation mb-3 gap-1 d-md-flex justify-content-md-center">
                @if ($currentStep > 1)
                    <button type="button" class="previous btn btn-info float-left mr-5"
                        wire:click="decreaseStep()">Anterior</button>
                @endif
                @if ($currentStep != $totalSteps)
                    <button type="button" class="next btn btn-info float-right mr-5"
                        wire:click="increaseStep()">Proximo</button>
                @endif
                @if ($currentStep == 5)
                    <button type="submit" class="btn btn-success float-right mr-5">Enviar</button>
                @endif
            </div>
        </form>
    </div>
</div>
