   <div class="modal fade bd-modal-lg" id="ModalVisualizar{{ $inscricao->id }}" tabindex="-1" role="dialog" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Visualizar cadastro</h5>
                   <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true"></span>
                   </button>
               </div>
               <div class="modal-body">
                   <dl class="row">
                    <div class="col-6">
                        <h5>Dados pessoais</h5>
                        <dt>Nome completo:</dt>
                        <dd>{{ $inscricao->person->nome_completo }}</dd>
                        <dt>Data de Nascimento: </dt>
                        <dd>{{ $inscricao->person->data_nascimento }}</dd>
                        <dt>CPF: </dt>
                        <dd>{{ $inscricao->person->cpf }}</dd>
                        <dt>RG: </dt>
                        <dd>{{ $inscricao->person->rg }}</dd>
                        <dt>Genêro:</dt>
                        <dd>{{ $inscricao->person->genero }}</dd>
                        @if(isset($inscricao->person->profissao))<dt>Profissão: </@dt>
                        <dd>{{ $inscricao->person->profissao }}</dd>@endif
                    </div>   
                    <div class="col-6">
                        <h5>Dados de contato</h5>
                       <dt>Email:</dt>
                       <dd>{{ $inscricao->email }}</dd>
                       <dt>Telefone:</dt>
                       <dd>{{ $inscricao->person->telefone }}</dd>
                       @if(isset($inscricao->person->telefone_residencial))<dt>Telefone Residencial: </dt>
                       <dd>{{ $inscricao->person->telefone_residencial }}</dd>@endif
                    </div>
                    <br>
                    <div class="col-6">
                        <h5>Dados para associacão</h5>
                        <dt>Condicão:</dt>
                        <dd>@foreach (json_decode($inscricao->person->reason->condicao) as $item){{$item}}</br>@endforeach</dd>
                        <dt>Grau Parentesco: </dt>
                        <dd>{{$inscricao->person->reason->grau_parentesco}}</dd>
                       @if(isset($inscricao->person->reason->outros)) <dt>Outros: </dt>
                        <dd>{{$inscricao->person->reason->outros}}</dd>@endif
                        <dt>Tipo de associação:</dt>
                        <dd>@foreach ($inscricao->role as $item){{ $item->name }}</br>@endforeach</dd>
                        <dt>Tipo de pagamento: </dt>
                        <dd>@if(isset($inscricao->person->tipo_pagamento->name)){{ $inscricao->person->tipo_pagamento->name  }}@endif</dd>
                    </div>
                    <div class="col-6 row">
                        <h5>Dados de endereço:</h5>
                    <div class="col-5">
                        <dt>CEP: </dt>
                        <dd>{{ $inscricao->person->adress->cep }}</dd>
                        <dt>Rua: </dt>
                        <dd>{{ $inscricao->person->adress->rua }}</dd>
                        <dt>Bairro: </dt>
                        <dd>{{ $inscricao->person->adress->bairro }}</dd>
                        <dt>Número endereço: </dt>
                        <dd>{{ $inscricao->person->adress->nmrEndereco }}</dd>
                    </div>
                    <div class="col-5">
                           @if(isset($inscricao->person->adress->complemento))<dt>Complemento: </dt>
                           <dd>{{ $inscricao->person->adress->complemento }}</dd>@endif
                           <dt>Bairro: </dt>
                           <dd>{{ $inscricao->person->adress->bairro }}</dd>
                           <dt>Cidade: </dt>
                           <dd>{{ $inscricao->person->adress->cidade }}</dd>
                           <dt>Estado: </dt>
                           <dd>{{ $inscricao->person->adress->estado }}</dd>
                    </div>
                    </div>
                </dl>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn gray btn-outline-secondary"
                       data-dismiss="modal">{{ __('Close') }}</button>
               </div>
           </div>
       </div>
   </div>
