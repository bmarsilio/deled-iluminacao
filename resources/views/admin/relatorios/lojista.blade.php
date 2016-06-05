@inject('model_negocio_imagem', 'LuizaMoraes\Models\NegocioImagem')

@extends('layout.admin.base')

@section('content')

    <br />

    <div class="container">

        <h3>Relatório de Lojistas por data</h3>

        <p>
            <small>Relatório para fins de consulta dos contatos de lojistas recebidos entre um período de datas.</small>
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

        {!! Form::open(['route' => 'admin.relatorio.lojistas.form']) !!}

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

        @if($lojistas)

            <hr />

            <div class="table-responsive">
                <h4>Contatos entre <strong>{{ date("d/m/Y", strtotime($datas['data_inicial'])) }}</strong> e <strong>{{ date("d/m/Y", strtotime($datas['data_final'])) }}</strong></h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Nome Fantasia</th>
                        <th>CNPJ</th>
                        <th>Website</th>
                        <th>Endereço</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Imagens</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($lojistas as $lojista)
                        <tr>
                            <td>{{ date("d/m/Y", strtotime($lojista->data_contato)) }}</td>
                            <td>{{ $lojista->nome }}</td>
                            <td>{{ $lojista->nome_fantasia }}</td>
                            <td>{{ $lojista->cnpj }}</td>
                            <td>{{ $lojista->website }}</td>
                            <td>{{ $lojista->endereco }}</td>
                            <td>{{ $lojista->cidade }}</td>
                            <td>{{ $lojista->estado }}</td>
                            <td>{{ $lojista->telefone }}</td>
                            <td>{{ $lojista->email }}</td>
                            <td>

                                @foreach($model_negocio_imagem->where('negocio_id', $lojista->negocio_id)->get() as $imagem)

                                    <a href="{{ url('/uploads/negocio/negocio_'.$imagem->id.'.'.$imagem->extensao) }}" class="thumb">
                                        <img src="{{ url('/uploads/negocio/negocio_'.$imagem->id.'.'.$imagem->extensao) }}" width="80px">
                                    </a>

                                @endforeach

                            </td>
                        </tr>
                    @endforeach()
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection