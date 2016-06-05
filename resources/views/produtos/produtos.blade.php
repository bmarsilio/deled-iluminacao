@extends('layout.home.base')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">

                    <hr />
                    <h2 class="intro-text text-center">
                        <strong>{{ $categoria->descricao }}</strong>
                    </h2>
                    <hr />

                    <p class="text-center">{{ $categoria->resumo }}</p>

                </div>
            </div>
        </div>

        @foreach($categoria->produtos as $produto)
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">

                        <hr />
                        <h2 class="intro-text text-center">
                            <strong>{{ $produto->titulo }}</strong>
                        </h2>
                        <hr />
                        <p class="text-center">{{ $produto->resumo }}</p>

                        @foreach($produto->imagens as $imagem)

                            <div class="col-lg-3 gallery-item">
                                <a href="{{ url('/uploads/produtos/produto_'.$imagem->id.'.'.$imagem->extensao) }}" data-lightbox-gallery="{{ $imagem->item_home_id }}" class="galeria">
                                    <img src="{{ url('/uploads/produtos/produto_'.$imagem->id.'.'.$imagem->extensao) }}" class="img-responsive img-border img-left">
                                </a>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection