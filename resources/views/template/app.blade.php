<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | SISPROV</title>
    <link href="{{ url('css/style.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<header class="header hidden-print">
    <div class="container">
        <h1 class="h1 text-center">SISPROV<br>
            <small>Sistema de Programação de Viagem</small>
        </h1>
    </div>
    @include('template.menu')
</header>

<section class="content">
    @yield('content')
</section>
<footer class="footer hidden-print">
    <div class="container">
        <p class="text-center">&copy SISPROV - Todos os Direitos Reservados - 2016 @if ( date('Y') != '2016' )
                ~ {{ date('Y') }} @endif</p>
    </div>
</footer>


<div class="modal fade sisprov-info" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>SISPROV</h4>
            </div>
            <div class="modal-body">
                <p><Strong>Versão: </Strong>1.0</p>
                <p><Strong>Requisitos: </Strong><br>
                Navegador....
                </p>


            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ url('js/jquery.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/scripts.js') }}"></script>


</body>
</html>
