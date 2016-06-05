<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin | Iluminação</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Cadastros
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.cadastros.banners.grid') }}">
                                Banners
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>

                        <li>
                            <a href="{{ route('admin.cadastros.home.grid') }}">
                                Itens Home
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>

                        <li>
                            <a href="{{ route('admin.cadastros.noticia.grid') }}">
                                Notícias
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>

                        <li>
                            <a href="{{ route('admin.cadastros.rede-social.grid') }}">
                                Redes Sociais
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>


            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Relatórios
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.relatorios.contatos.index') }}">
                                1 - Contatos
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/register">Criar uma nova conta</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>