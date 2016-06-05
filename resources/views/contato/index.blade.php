@extends('layout.home.base')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">

                    <hr />
                    <h2 class="intro-text text-center">Formulário de
                        <strong>contato</strong>
                    </h2>
                    <hr />

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, vitae, distinctio, possimus repudiandae cupiditate ipsum excepturi dicta neque eaque voluptates tempora veniam esse earum sapiente optio deleniti consequuntur eos voluptatem.</p>


                    {!! Form::open(['route' => 'contato.store']) !!}

                    <div class="form-group col-lg-6">
                        {!! Form::label('nome', 'Nome:') !!}
                        {!! Form::input('text', 'nome', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-lg-6">
                        {!! Form::label('telefone', 'Telefone:') !!}
                        {!! Form::input('text', 'telefone', null, ['class' => 'form-control', 'data-mask' => '(99) 9999-99999']) !!}
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-group col-lg-12">
                        {!! Form::label('mensagem', 'Mensagem') !!}
                        {!! Form::textarea('mensagem', null, ['class' => 'form-control']) !!}
                    </div>

                    <hr />
                    <div class="form-group text-center">
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                    </div>
                    <hr />

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>

@endsection