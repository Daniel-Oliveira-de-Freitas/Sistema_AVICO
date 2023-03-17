@extends('layouts.app')
@section('title', 'Fale Conosco')

@section('content')

    <!-- Contato-->
    <section class="page-section" id="contact">
        <div class="container bg-light" style="padding: 100px 100px; border-radius: 20px;" >
   <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="/fale_conosco/mail" method="post">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" name="name" type="text" placeholder="Seu Nome *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">Um nome é obrigatório.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" name="email" type="email" placeholder="Seu E-mail *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">Um e-mail é obrigatório</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email não é válido.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="Seu Telefone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">Um número de telefone é obrigatório.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" name="message" placeholder="Sua Mensagem *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">Uma mensagem é obrigatória.</div>
                        </div>
                    </div>
                </div>
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Enviar Mensagem</button></div>
            </form>
        </div>
    </section>
@endsection