@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">
        <div class="row">
            <a href="{{ route('admin.cadastros.noticia.grid') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-arrow-left"></i>
                Voltar
            </a>
        </div>

        <h3>Edição da notícia "<strong>{{ $data->titulo }}</strong>"</h3>

        <hr />
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->keys() as $key)
                        <li>{{ $errors->get($key)[0] }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['route' => ['admin.cadastros.noticia.update', $data->id], 'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('titulo', 'Título: *') !!}
            {!! Form::text('titulo', $data->titulo, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('conteudo', 'Conteúdo: *') !!}
            {!! Form::textarea('conteudo', $data->conteudo, ['class' => 'form-control', 'required', 'id' => 'textarea']) !!}
        </div>

        <hr />

        <div class="form-group">
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection