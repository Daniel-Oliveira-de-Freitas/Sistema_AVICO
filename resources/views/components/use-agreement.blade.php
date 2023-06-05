    <div id="useAgreement" style="display: none">
        <div class="footer py-lg-2">
            <div class="row align-items-center">
                <div class="d-block col text-lg">
                    <p>
                        Ao utilizar o site da Avico Brasil eu concordo com os
                        seguintes termos:
                        <a href="{{ asset('images/assets/politicas_termos/Política de Privacidade.pdf') }}"
                            target="_blank">Termo de
                            privacidade</a>
                        e
                        <a href="{{ asset('images/assets/politicas_termos/Termos de Uso e Condições.pdf') }}"
                            target="_blank">Termo de uso e
                            condições</a>
                    </p>
                </div>
                <div class="col-lg-2 my-1 my-lg-0">
                    <button type="button" class="btn btn-primary" id="agreeBtn">Li e aceito os termos</button>
                </div>
            </div>
        </div>
    </div>

    <script lang="js" defer>
        window.onload = function() {
            if (getCookie()) {
                $("#useAgreement").css('display', 'none');
                return;
            }

            $("#useAgreement").css('display', 'block');
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
            $('#useAgreement').css('display', 'none').remove();

        }

        document.getElementById("agreeBtn").addEventListener("click", function() {
            setCookie()
        });
    </script>
