@extends('layouts.app')
@section('title', 'Fale Conosco')

@section('content')

    <section class="page-section" id="contact">
        <div class="container bg-light shadow p-3 mb-5 rounded" style="padding: 100px 100px; border-radius: 20px;">
            @if (session('success'))
                <x-alert alertType="success" dismissible='true' message="{{ Session::get('success') }}" />
            @endif
            <form id="contactForm" action="/fale_conosco/mail" method="POST">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text"
                                placeholder="Seu Nome*" />
                            <label for="name">Seu Nome*</label>
                            <x-error-message errorName="name" />
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="Seu Email*">
                            <label for="email">Seu Email*</label>
                            <x-error-message errorName="email" />
                        </div>
                        <div class="form-floating mb-md-0">
                            <input class="form-control" id="floatingPhone" name="phone" type="text"
                                placeholder="Seu Telefone*">
                            <label for="floatingPhone">Seu Telefone*</label>
                            <x-error-message errorName="phone" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating form-group-textarea mb-md-0">
                            <textarea class="form-control" id="message" name="message" placeholder="Sua Mensagem*"></textarea>
                            <label for="floatingPhone">Sua Mensagem*</label>
                            <x-error-message errorName="message" />
                        </div>
                    </div>
                </div>
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton"
                        type="submit">Enviar Mensagem</button></div>
            </form>
        </div>
    </section>
@endsection
