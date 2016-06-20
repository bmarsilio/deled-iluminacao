@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <div class="row">
            <a href="{{ route('admin.cadastros.categoria.create') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-file"></i>
                Nova Categoria
            </a>

            <h3>Categorias</h3>

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
                    <th>Descrição</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($data as $categoria)

                    <tr>

                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->descricao }}</td>
                        <td>

                            <a href="{{ route('admin.cadastros.categoria.edit', ['id' => $categoria->id]) }}" class="btn btn-primary">
                                Editar
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.categoria.destroy', ['id' => $categoria->id]) }}" class="btn btn-danger">
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