@extends('layout.home.base')

@section('content')

    <br />

    <div class="container text-center">
        <div class="row">
            <div class="box">
                @if(Session::has('obrigado'))

                    <div class="alert alert-success">
                        <strong>
                            Obrigado pelo seu contato, estaremos entrando em contato o mais breve possível
                        </strong>
                    </div>

                @endif

                <hr />
                <a href="{{ URL::previous() }}" class="btn btn-success">
                    Voltar
                </a>
                <hr />

            </div>
        </div>
    </div>

@endsection