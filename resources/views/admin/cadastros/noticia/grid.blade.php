@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <div class="row">
            <a href="{{ route('admin.cadastros.noticia.create') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-file"></i>
                Nova Notícia
            </a>

            <h3>Notícias</h3>

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
                    <th>Título</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($data as $noticia)

                    <tr>

                        <td>{{ $noticia->id }}</td>
                        <td>{{ $noticia->titulo }}</td>
                        <td>

                            <a href="{{ route('admin.cadastros.noticia.edit', ['id' => $noticia->id]) }}" class="btn btn-primary">
                                Editar
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.noticia.imagens', ['id' => $noticia->id]) }}" class="btn btn-warning">
                                Imagens
                                <i class="glyphicon glyphicon-picture"></i>
                            </a>

                            <a href="{{ route('admin.cadastros.noticia.destroy', ['id' => $noticia->id]) }}" class="btn btn-danger">
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