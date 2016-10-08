<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="#">SISPROV</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                @if(!auth()->guest())
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('agendamentos') }}">Agendamentos</a></li>
                    @if(Auth::user()->level > 1)
                        <li><a href="{{ route('servidores.index') }}">Servidores</a> </li>
                        <li><a href="{{ route('cargos.index') }}">Cargos</a> </li>
                        <li><a href="{{ route('veiculos.index') }}">Veículos</a> </li>
                    @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(auth()->guest())
                        <li><a href="{{ url('/auth/login') }}"><i class="glyphicon glyphicon-log-in"></i> Entar </a></li>
                @else

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->nome }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('users.edit', Auth::user()->id) }}"><i class="glyphicon glyphicon-user"></i> Meus dados</a></li>
                            <li><a href="{{ route('users.password', Auth::user()->id) }}"><i class="fa fa-key"></i> Alterar Senha</a></li>
                            <li role="separator" class="divider"></li>
                            @if(Auth::user()->level > 1)
                            <li><a href="{{ route('users.index') }}"><i class="glyphicon glyphicon-cog"></i> Gerenciar Usuários</a> </li>
                            <li role="separator" class="divider"></li>
                            @endif
                            <li><a href="{{ url('/auth/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target=".sisprov-info"><i aria-hidden="true" class="fa fa-info-circle"></i> Sobre</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>