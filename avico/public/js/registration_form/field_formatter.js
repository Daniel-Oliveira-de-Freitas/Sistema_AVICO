Livewire.on('jquery', event => {
    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#endereco").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#complemento").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function () {

        //Nova variável "cep" somente com dígitos.
        let cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            let validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#endereco").val(dados.logradouro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#complemento").val(dados.complemento);
                        $("#bairro").val(dados.bairro);
                        $('#message_errorCep').css('visibility', 'hidden');
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontradoe, então irá limpar os campos e deixar a mensagem de erro visivel
                        limpa_formulário_cep();
                        $("#message_errorCep").css("visibility", "visible");
                    }
                });
            } //end if.
            else {
                //cep é inválido, então irá limpar os campos e deixar a mensagem de erro visivel
                limpa_formulário_cep();
                $('#message_errorCep').css('visibility', 'visible');

            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
            $('#message_errorCep').css('visibility', 'hidden');
        }
    });
});