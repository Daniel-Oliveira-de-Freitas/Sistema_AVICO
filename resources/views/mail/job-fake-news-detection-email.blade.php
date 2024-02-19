@component('mail::message')
    | Link da noticia | Classificação |
    | :----------------|:----------------|
@foreach($noticiasVerificadas as $item)
    | <{{$item["link"]}}> | {{$item["text"]}}|
@endforeach
@endcomponent
