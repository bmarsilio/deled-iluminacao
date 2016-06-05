<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr />
            <h2 class="intro-text text-center">Últimas
                <strong>notícias</strong>
            </h2>
            <hr />

            @foreach($ultimas_noticias as $noticia)
                <div class="col-lg-4">

                    @foreach($noticia->imagens as $i => $imagem)
                        @if($i == 0)
                            <img class="img-responsive img-border img-left" src="{{ url('/uploads/noticias/noticia_'.$imagem->id.'.'.$imagem->extensao) }}" alt="">
                            <hr class="visible-xs">
                        @endif
                    @endforeach

                    <div class="clearfix"></div>
                    <h4>{{ $noticia->titulo }}</h4>
                    <p>{{ substr($noticia->conteudo, 0, 30) }} ...</p>
                    <a href="{{ route('home.noticia', ['noticia_id' => $noticia->id]) }}" class="btn btn-default">Saiba Mais</a>
                </div>
            @endforeach

        </div>
    </div>
</div>