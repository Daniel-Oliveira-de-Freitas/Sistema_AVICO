@component('mail::message')
    ## A seguir, o resultado de varredura da fake news:
@if(isset($noticiasVerificadas["error"]))
# Nenhuma noticia encontrada
@else
| Link da noticia | Classificação |
| :---------------|:--------------|
@foreach($noticiasVerificadas as $item)
| <{{$item["link"]}}> | {{$item["text"]}}|
@endforeach
@endif
@endcomponent
