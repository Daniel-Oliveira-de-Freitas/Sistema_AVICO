@component('mail::message')
# O usuario {{ $nome }}

## Enviou a segunte mensagem

{{ $assunto }}


## Informaçoes de contato do usuario:<br>
## Email: {{ $email }}
## Telefone: {{ $telefone }}
@endcomponent
