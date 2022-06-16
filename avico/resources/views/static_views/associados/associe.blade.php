@extends('layouts.app')
@section('title', 'Formulário para associar-se a Avico')
<link rel="stylesheet" href="/css/style.css">
<style>
  /* #checkboxdiv {
        display: none;
    }

    #termos:checked~#checkboxdiv {
        /* height: 100px; */
      display: block;
    }  */

    #grauParentesco {
        display: none;
    }

    #outrosDiv {
        display: none;
    }

    /* #familiar:checked+#grauParentesco {
        display: block;
    }  */
</style>

@section('content')
    <form action="{{ action('App\Http\Controllers\AssocieController@store') }}" method="post" class="form">
        @csrf
        <div class="form-group">
        <p>TERMO DE ASSOCIAÇÃO
            <br>
            Os dados fornecidos serão utilizados exclusivamente pela nossa Associação, sendo vedado o uso para fins
            diversos, seguindo a Lei Geral Proteção de Dados LEI Nº 13.709, DE 14 DE AGOSTO DE 2018.

            Venho, através do preenchimento dos dados solicitados neste Termo de Associação, requerer a admissão como
            Associado da AVICO – Associação de Vítimas e Familiares de vítimas de COVID-19, inscrita no CNPJ sob nº
            42.900.150/0001-00, com sede na Avenida Praia de Belas, nº 454, apto 201, Praia de Belas, CEP 90110-000, Porto
            Alegre/RS, de acordo com o artigo 27, parágrafo segundo, do Estatuto e suas alterações, disponível no site
            www.avico.com.br, do qual declaro, por meio deste termo, ter total conhecimento e me comprometo a respeitar
            todas as suas disposições.
        </p>
        <input id="termos" name="termos" type="checkbox">
        <label for="termos">Concorda com os termos de associação?</label>
    </div>
        <div id="checkboxdiv">

            <div class="form-group">
                <span>Nome completo</label>
                    <input class="form-control form-control-lg" type="text" name="nome">
            </div>
            <div class="form-group">
                <label>Data de Nascimento</label>
                <input class="form-control" type="date" name="dataNascimento">
            </div>
            <div class="form-group">
                <label>Gênero:</label>
                <span><input class="form-control" type="radio" name="genero" id="Masculino"
                        value="Masculino">Masculino</span>
                <span><input class="form-control" type="radio" name="genero" id="Feminino" value="Feminino">Feminino</span>
                <span><input class="form-control" type="radio" name="genero" id="Neutro" value="Neutro">Neutro</span>
            </div>
            <div class="mb-3">
                <label>CPF:</label>
                <input class="form-control" type="number">
            </div>
            <div class="mb-3">
                <label>RG</label>
                <input class="form-control" type="number">
            </div>
            <div class="mb-3">
                <label>Celular (DDD+número)</label>
                <input class="form-control" type="number">
            </div>
            <div class="mb-3">
                <label>Telefone residencial (DDD+número): </label>
                <input class="form-control" type="number">
            </div>
            <div>
                <label>E-mail:</label>
                <input class="form-control" type="email">
            </div>
            <div>
                <label>Endereço:</label>
                <input class="form-control" type="text">
            </div>
            <div>
                <label>Nº:</label>
                <input type="number">
            </div>
            <div>
                <label>Complemento:</label>
                <input type="text">
            </div>
            <div>
                <label>CEP:</label>
                <input type="text">
            </div>
            <div>
                <label>Bairro:</label>
                <input type="text">
            </div>
            <div>
                <label>Cidade/UF:</label>
                <input type="text">
            </div>
            <div>
                <label>Profissão:</label>
                <input type="text">
            </div>
            <div>

                <div>

                    <label>Qual sua condição para se tornar associado?</label>
                    <span><input class="condicao" type="checkbox" name="condicao" id="condicao-1"
                            onclick="verifyCheckbox(this.id)" value="Sobrevivente da COVID-19">Sobrevivente da
                        COVID-19</span>
                    <span>
                        <input class="condicao" type="checkbox" name="condicao" id="condicao-2"
                            value="Familiar de vítima da COVID-19" onclick="verifyCheckbox(this.id)">Familiar de vítima da
                        COVID-19
                    </span>
                </div>
            </div>
            <div id="grauParentesco">
                <label>Qual o grau de parentesco com a vítima?</label>
                <select name="" id="" onchange="addOption()">
                    <option value="Cônjuge ou companheiro(a)">Cônjuge ou companheiro(a)</option>
                    <option value="1º grau em linha reta (pai/mãe, filho/filha)">1º grau em linha reta (pai/mãe,
                        filho/filha)</option>
                    <option value="2º grau em linha reta (avô/avó, neto/neta)">2º grau em linha reta (avô/avó, neto/neta)
                    </option>
                    <option value="3º grau em linha colateral (tio/tia, sobrinho/sobrinha)">3º grau em linha colateral
                        (tio/tia, sobrinho/sobrinha)</option>
                    <option id="outros">Outros</option>
                </select>
                <div id="outrosDiv">
                    <span>Especificar</span>
                    <input type="text">
                </div>
            </div>

            <div>
                <label>Deseja se tornar um voluntário da AVICO?</label>
                <span><input class="condicao" type="checkbox" name="condicao" id="condicao-1" value="Sim">Sim</span>
                <span>
                    <input class="condicao" type="checkbox" name="condicao" id="condicao-2" value="Não">Não</span>
            </div>

        </div>
        <div class="form-navigation">
            <button class="previous">Previous</button>
            <button class="next">next</button>
            <button>Submit</button>
        </div>
    </form>
    
    <script type="text/javascript">
        function addOption() {
            if (document.getElementById('outros').selected) {
                document.getElementById('outrosDiv').style.display = 'block';
            } else
                document.getElementById('outrosDiv').style.display = 'none';
        }

        function valueChanged() {
            if (document.getElementById('condicao-2').checked)
                document.getElementById('grauParentesco').style.display = 'block';
            else
                document.getElementById('grauParentesco').style.display = 'none';
        }

        function verifyCheckbox(id) {
            for (var i = 1; i < 3; i++) {
                document.getElementById('condicao-' + i).checked = false;
            }
            document.getElementById(id).checked = true;
            valueChanged()
        }

        $(function() {
            var $sections = $('.form-group');
            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd= index>=$sections.lenght -1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            } 

            function curIndex() {
          return $sections.index($sections.filter('.current'));
            } 

            $('.form-navigation .previous').click(function(){
                navigateTo(curIndex()-1);
            })

            $('.form-navigation .next').click(function(){
               $('.form').parsely().whenValidate({
                group:'block-' + curIndex()
               }).done(function(){
                navigateTo(curIndex()+1);
               })
            })

            $sections.each(function(index,section){
                $(section).find(':input').attr('data-parsley-group','block'+index);
            });

            navigateTo(0);
        });
    </script>
@endsection
