    <div class="modal fade" id="useAgreement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="useAgreementLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="useAgreementLabel">Termos de uso</h5>
                </div>
                <div class="modal-body">
                    <p>
                        Ao utilizar o site da Avico Brasil eu concordo com os
                        seguintes termos:
                    </p>
                    <a href="{{ asset('images/assets/politicas_termos/Política de Privacidade.pdf') }}"
                        target="_blank">Termo de
                        privacidade</a>
                    e
                    <a href="{{ asset('images/assets/politicas_termos/Termos de Uso e Condições.pdf') }}"
                        target="_blank">Termo de uso e
                        condições</a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        id="disagreBtn">Recusar</button>
                    <button type="button" class="btn btn-primary" id="agreeBtn">Li e aceito os termos</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            if (getCookie() != true) {
                $('#useAgreement').modal('show')
            }
        };

        const cookieValue = document.cookie
            .split("; ")
            .find((row) => row.startsWith("user_agreement="))
            ?.split("=")[1];


        function getCookie() {
            if (cookieValue != null && atob(cookieValue) === 'accept') {
                $("#useAgreement").remove()
                return true;
            }

            return false;
        }

        function setCookie() {
            document.cookie = `user_agreement=${btoa("accept")}`;
            $('#useAgreement').modal('hide').remove();

        }

        document.getElementById("agreeBtn").addEventListener("click", function() {
            setCookie()
        });
    </script>
