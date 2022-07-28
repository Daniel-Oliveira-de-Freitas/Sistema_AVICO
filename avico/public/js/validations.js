$("#outrosData").removeAttr('required');
$("#parentesco").removeAttr('required');
$("#comprovanteMedico").removeAttr('required');
$("#certidaoObito").removeAttr('required');
$("#deposito").removeAttr('required');
$("#pix").removeAttr('required');

function outrosInputShow() {
    if (document.getElementById('outros').selected) {
        document.getElementById('outrosInput').style.display = 'block';
        $("#outrosData").attr('required', 'required');
    } else {
        document.getElementById('outrosInput').style.display = 'none';
        $("#outrosData").removeAttr('required');
    }
}
$(document).on("keypress", 'form', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    }
});



function familiarVitimaInputShow() {
    if (document.getElementById('familiar').checked == true) {
        document.getElementById('grauParentesco').style.display = 'block';
        document.getElementById('certidao_obito').style.display = 'block';
        $("#certidaoObito").attr('required', 'required');
    } else {
        document.getElementById('grauParentesco').style.display = 'none';
        document.getElementById('certidao_obito').style.display = 'none';
        $("#certidaoObito").removeAttr('required');
    }
}

function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
        object.value = object.value.slice(0, object.maxLength)
}

function sobreviventeInputShow() {
    if (document.getElementById('sobrevivente').checked) {
        document.getElementById('comprovante').style.display = 'block';
        $("#comprovanteMedico").attr('required', 'required');
    } else {
        document.getElementById('comprovante').style.display = 'none';
        $("#comprovanteMedico").removeAttr('required');
    }
}

$(document).ready(function () {

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
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

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

const campoCelular = document.querySelector("#celular");
const celularInput = window.intlTelInput(campoCelular, {
  preferredCountries: ["br", "us"],
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

const campoTelefoneResidencial = document.querySelector("#telefone_residencial");
const telefoneResidencialInput = window.intlTelInput(campoTelefoneResidencial, {
  preferredCountries: ["br", "us"],
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});

$('#celular').on().on('keyup', function (event) {
    event.preventDefault();
    if (celularInput.isValidNumber()) {
        $("#message_errorCelular").css("visibility", "hidden");
    } else {
        $("#message_errorCelular").css("visibility", "visible");
    }
});


$('#telefone_residencial').on().on('keyup', function (event) {
    event.preventDefault();
    if (telefoneResidencialInput.isValidNumber()) {
        $("#message_errorTelefoneResidencial").css("visibility", "hidden");
    } else {
        $("#message_errorTelefoneResidencial").css("visibility", "visible");
    }
});

function associadoPagamentoRequired() {
    if (document.getElementById('associado').checked == true) {
        $("#deposito").attr('required', 'required');
        $("#pix").attr('required', 'required');
        $("#deposito").attr('data-parsley-required data-parsley-mincheck', 'data-parsley-required data-parsley-mincheck');
        $("#pix").attr('data-parsley-required data-parsley-mincheck', 'data-parsley-required data-parsley-mincheck');
    } else {
        $("#deposito").removeAttr('required');
        $("#pix").removeAttr('required');
        $("#deposito").removeAttr('data-parsley-required data-parsley-mincheck', 'data-parsley-required data-parsley-mincheck');
        $("#pix").removeAttr('data-parsley-required data-parsley-mincheck', 'data-parsley-required data-parsley-mincheck');
    }
}

$('#password, #confirmPassword').on('keyup', function () {
    if ($('#password').val() == $('#confirmPassword').val()) {
        $('#message').html('');
    } else
        $('#message').html('As senhas não são identicas').css('color', 'red');
});

$('#nenhum:checkbox').click(function () {
    if ($(this).is(':checked')) {
        $('#familiar:checked').prop('checked', false);
        $('#sobrevivente:checked').prop('checked', false);
        $('#familiar').prop('disabled', true);
        $('#sobrevivente').prop('disabled', true);
    } else {
        $('#familiar:checkbox').prop('disabled', false);
        $('#sobrevivente:checkbox').prop('disabled', false);
    }
    condicaoChanged();
});

$('.tipo:checkbox').click(function (e) {
    if ($(this).is(':checked')) {
        associadoPagamentoRequired();
    }
});

function condicaoChanged() {
    familiarVitimaInputShow();
    sobreviventeInputShow();
}

$('.genero:checkbox').click(function (e) {
    if ($(this).is(':checked')) {
        $('.genero:checked').prop('checked', false);
        $(this).prop('checked', true);
    }
    else {
        e.preventDefault();
    }
});

$(function () {
    var $sections = $('.form-content');
    function navigateTo(index) {
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index > 0);
        var atTheEnd = index >= $sections.length - 1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [type=submit]').toggle(atTheEnd);
    }

    function currentIndex() {
        return $sections.index($sections.filter('.current'));
    }

    $('.form-navigation .previous').click(function () {
        if (document.getElementById('voluntario').checked && document.getElementById('associado').checked && currentIndex() == 4)
            navigateTo(currentIndex() - 1);
        else if (document.getElementById('voluntario').checked && currentIndex() == 4)
            navigateTo(currentIndex() - 2)
        else
            navigateTo(currentIndex() - 1);
    })

    $('.form-navigation .next').click(function () {
        $('.form-cadastro').parsley().whenValidate({
            group: 'block-' + currentIndex()
        }).done(function () {
            if (document.getElementById('voluntario').checked && document.getElementById('associado').checked && currentIndex() == 2)
                navigateTo(currentIndex() + 1)
            else if (document.getElementById('voluntario').checked && currentIndex() == 2)
                navigateTo(currentIndex() + 2)
            else
                navigateTo(currentIndex() + 1)
        })
    })

    $sections.each(function (index, section) {
        $(section).find(':input').attr('data-parsley-group', 'block-' + index);
    });

    navigateTo(0);
});

$('form').parsley().options.requiredMessage = "Este campo é obrigatório"
$.Parsley.requiredMessage = "this field is required"