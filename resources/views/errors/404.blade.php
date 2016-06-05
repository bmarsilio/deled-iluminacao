<!DOCTYPE html>
<html>
    <head>
        <title>404 | Página não encontrada</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('build/css/bootstrap.min.css') }}" rel="stylesheet">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Página não encontrada :(</div>
            </div>

            <hr />
            <a href="{{ URL::previous() }}" class="btn btn-primary">
                Clique aqui para voltar
            </a>
            <hr />

        </div>
    </body>
</html>
