@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <h3>Relatório de Contatos por data</h3>

        <p>
            <small>Relatório para fins de consulta dos contatos recebidos entre um período de datas.</small>
        </p>

        <p>
            <small><strong>*Dica:</strong> Para ver os contatos do dia de hoje, sempre coloque a data de amanhã no campo <i>Data Final</i></small>
        </p>
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

        {!! Form::open(['route' => 'admin.relatorio.contatos.form']) !!}

        <div class="row">
            <div class="form-group col-md-2">
                {!! Form::label('data_inicial', 'Data Inicial: *') !!}
                {!! Form::input('date', 'data_inicial', null, ['class' => 'form-control', 'required']) !!}
            </div>

            <div class="form-group col-md-2">
                {!! Form::label('data_final', 'Data FInal: *') !!}
                {!! Form::input('date', 'data_final', null, ['class' => 'form-control', 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

        @if($contatos)

            <hr />

            <div class="table-responsive">
                <h4>Contatos entre <strong>{{ date("d/m/Y", strtotime($datas['data_inicial'])) }}</strong> e <strong>{{ date("d/m/Y", strtotime($datas['data_final'])) }}</strong></h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Mensagem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contatos as $contato)
                        <tr>
                            <td>{{ date("d/m/Y", strtotime($contato->data_contato)) }}</td>
                            <td>{{ $contato->nome }}</td>
                            <td>{{ $contato->email }}</td>
                            <td>{{ $contato->telefone }}</td>
                            <td>{{ $contato->mensagem }}</td>
                        </tr>
                    @endforeach()
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection