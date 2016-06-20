@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">
        <div class="row">
            <a href="{{ route('admin.cadastros.categoria.grid') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-arrow-left"></i>
                Voltar
            </a>
        </div>

        <h3>Nova Categoria</h3>

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

        {!! Form::open(['route' => 'admin.cadastros.categoria.store']) !!}

        <div class="form-group">
            {!! Form::label('descricao', 'Descrição: *') !!}
            {!! Form::input('text', 'descricao', null, ['class' => 'form-control', 'required']) !!}
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