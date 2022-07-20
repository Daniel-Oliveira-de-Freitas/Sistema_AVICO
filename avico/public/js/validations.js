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

function maxLengthCheck(object)
{
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

// $('.pagamento:checkbox').click(function (e) {
//     if ($(this).is(':checked')) {
//         $('.pagamento:checked').prop('checked', false);
//         $(this).prop('checked', true);
//     }
//     else {
//         e.preventDefault();
//     }
// });


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