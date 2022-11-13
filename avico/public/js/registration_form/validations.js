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
    let code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    }
});

function familiarVitimaInputShow() {
    if (document.getElementById('familiar').checked) {
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

$('#telefone_residencial').on('keyup', function (event) {
    event.preventDefault();
    if (telefoneResidencialInput.isValidNumber()) {
        $("#message_errorTelefoneResidencial").css("visibility", "hidden");
    } else {
        $("#message_errorTelefoneResidencial").css("visibility", "visible");
    }
});

function comprovanteIsencaoInputShow() {
    if (document.getElementById('declaracao_isencao').checked) {
        document.getElementById('comprovante_isencao').style.display = 'block';
    } else {
        document.getElementById('comprovante_isencao').style.display = 'none';
    }
}

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
        $('#message_confirmPassword').html('');
    } else {
        $('#message_confirmPassword').html('As senhas não são identicas').css('color', 'red');
    }
    if ($('#password').val().trim().length > 4) {
        $('#message_password').html('');
    } else {
        $('#message_password').html('A senha deve conter mais do que 4 caracteres!').css('color', 'red');
    }
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

$('.raca_cor:checkbox').click(function (e) {
    if ($(this).is(':checked')) {
        $('.raca_cor:checked').prop('checked', false);
        $(this).prop('checked', true);
    }
    else {
        e.preventDefault();
    }
});
    
$('form').parsley().options.requiredMessage = "Este campo é obrigatório"
$.Parsley.requiredMessage = "this field is required"

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

$('#celular').on('keyup', function (event) {
    event.preventDefault();
    if (celularInput.isValidNumber()) {
        $("#message_errorCelular").css("visibility", "hidden");
    } else {
        $("#message_errorCelular").css("visibility", "visible");
    }
});