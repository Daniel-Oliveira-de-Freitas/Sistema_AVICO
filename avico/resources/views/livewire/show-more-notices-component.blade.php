    <div class="col-lg-3 leiamais">
        <div class="row border-start">
            <h5>Leia mais</h5>
        </div>
        @foreach ($notices as $item)
            <div class="row border-start mt-3 ps-2"><a href="{{ route('noticiaLer.avico', $item->id) }}">
                    {{ $item->titulo }}</a></div>
        @endforeach

    </div>
