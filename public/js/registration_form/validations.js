window.addEventListener('jquery2', event => {
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

});