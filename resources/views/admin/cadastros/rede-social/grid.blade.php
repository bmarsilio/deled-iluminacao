@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <div class="row">
            <a href="{{ route('admin.cadastros.rede-social.create') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-file"></i>
                Nova Rede Social
            </a>

            <h3>Redes Sociais</h3>

            <hr />
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover" id="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Descrição</th>
                    <th>Link</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($data as $rede_social)

                    <tr>

                        <td>{{ $rede_social->id }}</td>
                        <td>{{ $rede_social->descricao }}</td>
                        <td>{{ $rede_social->link }}</td>
                        <td>

                            <a href="{{ route('admin.cadastros.rede-social.edit', ['id' => $rede_social->id]) }}" class="btn btn-primary">
                                Editar
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.rede-social.destroy', ['id' => $rede_social->id]) }}" class="btn btn-danger">
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