@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <div class="row">
            <a href="{{ route('admin.cadastros.home.create') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-file"></i>
                Novo Item da Home
            </a>

            <h3>Itens da Home</h3>

            <hr />
        </div>

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

                @foreach($data as $item_home)

                    <tr>

                        <td>{{ $item_home->id }}</td>
                        <td>{{ $item_home->descricao }}</td>
                        <td>

                            <a href="{{ route('admin.cadastros.home.edit', ['id' => $item_home->id]) }}" class="btn btn-primary">
                                Editar
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.home.imagens', ['id' => $item_home->id]) }}" class="btn btn-warning">
                                Imagens
                                <i class="glyphicon glyphicon-picture"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.home.destroy', ['id' => $item_home->id]) }}" class="btn btn-danger">
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