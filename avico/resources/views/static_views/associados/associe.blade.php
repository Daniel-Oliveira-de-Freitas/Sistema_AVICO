@extends('layouts.app')
@section('title', 'Formulário para associar-se a Avico')

@section('content') 
<section class="form_body container rows col-md-6 offset-md-3">
    <livewire:associe-component />
</section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script type="text/javascript" src="./js/registration_form/validations.js"></script>
    <script type="text/javascript" src="./js/registration_form/field_formmatter.js"></script>
    {{-- <script type="text/javascript" src="./js/registration_form/pdf_generator.js"></script> --}}
    {{-- <script type="text/javascript" src="./js/registration_form/form_control.js"></script> --}}
@endsection