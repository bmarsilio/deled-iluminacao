@extends('layout.admin.base')

@section('content')
    <div class="container">

        <div class="row">

            <a href="{{ route('admin.cadastros.produto.grid') }}" class="btn btn-default">
            <i class="glyphicon glyphicon-arrow-left"></i>
            Voltar
            </a>

            <a href="{{ route('admin.cadastros.produto.imagens.create', ['id' => $produto->id]) }}" class="btn btn-default">
                <i class="glyphicon glyphicon-file"></i>
                Nova Imagem
            </a>

            <h3>Imagens do produto: <i>{{ $produto->titulo }}</i></h3>

            <hr />
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Imagem</th>
                    <th>Extensão</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($produto->imagens as $image)
                    <tr>
                        <td>{{ $image->id }}</td>

                        <td>
                            <img src="{{ url('/uploads/produtos/produto_'.$image->id.'.'.$image->extensao) }}" width="80px">
                        </td>

                        <td>{{ $image->extensao }}</td>

                        <td>
                            <a href="{{ route('admin.cadastros.produto.imagens.destroy', ['id' => $image->id]) }}" class="btn btn-danger">
                                Excluir
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>

@endsection