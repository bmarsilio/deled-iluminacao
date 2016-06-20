@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <div class="row">
            <a href="{{ route('admin.cadastros.produto.create') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-file"></i>
                Novo Produto
            </a>

            <h3>Produtos</h3>

            <hr />
        </div>


        @if(Session::has('erro'))
            <div class="alert alert-danger text-center" role="alert">
                <p><strong>{{ Session::get('erro') }}</strong></p>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover" id="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th>Título</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($data as $produto)

                    <tr>

                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->categoria->descricao }}</td>
                        <td>{{ $produto->titulo }}</td>
                        <td>

                            <a href="{{ route('admin.cadastros.produto.edit', ['id' => $produto->id]) }}" class="btn btn-primary">
                                Editar
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.produto.imagens', ['id' => $produto->id]) }}" class="btn btn-warning">
                                Imagens
                                <i class="glyphicon glyphicon-picture"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.produto.destroy', ['id' => $produto->id]) }}" class="btn btn-danger">
                                Excluir
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>

                        </td>
                    </tr>

                @endforeach()

                </tbody>
            </table>
        </div>

    </div>

@endsection()