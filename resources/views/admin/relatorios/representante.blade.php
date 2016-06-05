@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <h3>Relatório de Representantes por data</h3>

        <p>
            <small>Relatório para fins de consulta dos contatos de representantes recebidos entre um período de datas.</small>
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

        {!! Form::open(['route' => 'admin.relatorio.representantes.form']) !!}

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

        @if($representantes)

            <hr />

            <div class="table-responsive">
                <h4>Contatos entre <strong>{{ date("d/m/Y", strtotime($datas['data_inicial'])) }}</strong> e <strong>{{ date("d/m/Y", strtotime($datas['data_final'])) }}</strong></h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Praças que atende</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($representantes as $representante)
                        <tr>
                            <td>{{ date("d/m/Y", strtotime($representante->data_contato)) }}</td>
                            <td>{{ $representante->nome }}</td>
                            <td>{{ $representante->cnpj }}</td>
                            <td>{{ $representante->endereco }}</td>
                            <td>{{ $representante->cidade }}</td>
                            <td>{{ $representante->estado }}</td>
                            <td>{{ $representante->telefone }}</td>
                            <td>{{ $representante->email }}</td>
                            <td>{{ $representante->pracas_que_atende }}</td>
                        </tr>
                    @endforeach()
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection