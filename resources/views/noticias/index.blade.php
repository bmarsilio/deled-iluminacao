@extends('layout.home.base')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">

                    <hr />
                    <h2 class="intro-text text-center">
                        <strong>Notícias</strong>
                    </h2>
                    <hr />

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, vitae, distinctio, possimus repudiandae cupiditate ipsum excepturi dicta neque eaque voluptates tempora veniam esse earum sapiente optio deleniti consequuntur eos voluptatem.</p>

                </div>
            </div>
        </div>

        @foreach($noticias as $noticia)

            <div class="row">
                <div class="box">
                    <div class="col-lg-12">

                        <hr />
                        <h2 class="intro-text text-center">
                            <strong>{{ $noticia->titulo }}</strong>
                        </h2>
                        <hr />

                        @foreach($noticia->imagens as $imagem)

                            <div class="col-lg-3 gallery-item">
                                <a href="{{ url('/uploads/noticias/noticia_'.$imagem->id.'.'.$imagem->extensao) }}" data-lightbox-gallery="{{ $imagem->item_home_id }}" class="galeria">
                                    <img src="{{ url('/uploads/noticias/noticia_'.$imagem->id.'.'.$imagem->extensao) }}" class="img-responsive img-border img-left">
                                </a>
                            </div>

                        @endforeach

                        <p>{{ $noticia->conteudo }}</p>

                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection