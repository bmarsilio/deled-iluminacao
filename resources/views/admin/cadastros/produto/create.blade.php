@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">
        <div class="row">
            <a href="{{ route('admin.cadastros.produto.grid') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-arrow-left"></i>
                Voltar
            </a>
        </div>

        <h3>Novo Produto</h3>

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

        {!! Form::open(['route' => 'admin.cadastros.produto.store']) !!}

        <div class="form-group">
            {!! Form::label('categoria', 'Categoria: *') !!}
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                @endforeach()
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('titulo', 'Título: *') !!}
            {!! Form::input('text', 'titulo', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('resumo', 'Resumo: *') !!}
            {!! Form::textarea('resumo', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <hr />

        <div class="form-group">
            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection