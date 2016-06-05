@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <div class="row">
            <a href="{{ route('admin.cadastros.banners.create') }}" class="btn btn-default">
                <i class="glyphicon glyphicon-file"></i>
                Novo Banner
            </a>

            <h3>Banners</h3>

            <hr />
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover" id="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th></th>
                    <th>Ordem</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($data as $banner)

                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td>
                            <img src="{{ url('uploads/banners/banner_'.$banner->id.'.'.$banner->extensao) }}" width="80px">
                        </td>
                        <td>{{ $banner->ordem }}</td>
                        <td>
                            <a href="{{ route('admin.cadastros.banners.destroy', ['id' => $banner->id]) }}" class="btn btn-danger">
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