<div>
    <div class="card">
        <img class="card-img-top d-block w-100" src="{!! $notice->caminho_imagem !!}"
             alt="{!! $notice->titulo !!}">
        <div class="card-body">
            <p class="datanoticia">{!! $notice->created_at->format('d-m-y') !!}</p>
            <p class="card-text altura-linha"><b>{!! $notice->titulo !!}</b>
            </p>
            <a class="btn btn-primary btn-sm"
               href="{!! route('visualizar.noticia', $notice->id) !!}">Leia
                Mais</a>
        </div>
    </div>
</div>
