<div>
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
        <div class="carousel-inner mb-2" role="listbox">
            <div class="carousel-item active">
                @forelse($notices as $index => $notice)
                    @if ($index < 3)
                        <div class="col-md-4 px-3 @if ($index > 0) lgcards @endif" style="float:left">
                            <x-card-notice :notice="$notice" />
                        </div>
                    @endif
                @empty
                    <h4 class="text-center">Nenhuma notícia publicada</h4>
                @endforelse
            </div>
            <div class="carousel-item">
                @foreach ($notices as $index => $notice)
                    @if ($index > 2)
                        <div class="col-md-4 px-3 @if ($index > 3) lgcards @endif" style="float:left">
                            <x-card-notice :notice="$notice" />
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <ol class="carousel-indicators">
            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
            @if (empty($notices))
                <li data-target="#multi-item-example" data-slide-to="1"></li>
            @endif
        </ol>
    </div>
</div>
