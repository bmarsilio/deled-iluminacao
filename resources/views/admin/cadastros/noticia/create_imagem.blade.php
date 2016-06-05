@extends('layout.admin.base')

@section('content')

    <div class="container">
        <div class="row">

            <a href="{{ route('admin.cadastros.noticia.imagens', ['id' => $noticia->id]) }}" class="btn btn-default">
                <i class="glyphicon glyphicon-arrow-left"></i>
                Voltar
            </a>

            <h3>Upload de imagens para a notícia: <i>{{ $noticia->titulo }}</i></h3>

            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <hr />
        </div>

        {!! Form::open(['route' => ['admin.cadastros.noticia.imagens.store', $noticia->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('imagem', 'Imagem:') !!}
            {!! Form::file('imagem', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection