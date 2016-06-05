@inject('controller', 'Iluminacao\Http\Controllers\ProdutoController')

{{-- CHAMA CATEGORIAS CADASTRADAS--}}
{{--*/ $categorias = $controller->getCategorias() /*--}}


<div class="brand">Business Casual</div>
<div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="{{ route('home.index') }}">Business Casual</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('home.index') }}">Home</a>
                </li>

                <li>
                    <a href="{{ route('home.sobre.index') }}">Sobre</a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Produtos
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($categorias as $categoria)
                            <li>
                                <a href="{{ route('home.produto.index', ['categoria_id' => $categoria->id]) }}">
                                    {{ $categoria->descricao }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="{{ route('home.noticias.index') }}">Notícias</a>
                </li>

                <li>
                    <a href="{{ route('contato.index') }}">Contato</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>