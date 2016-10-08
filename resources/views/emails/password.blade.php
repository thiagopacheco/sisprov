<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISPROV - Reset de senha</title>
</head>
<body>
<h1>SISPROV</h1>
<br>
<p>Para recuperar sua senha, clique no link abaixo.</p>
<p>{{ url('password/reset/'.$token) }}</p>
<p>Caso você não reconheça essa solicitação, recomendamos que altere sua senha no sistema.</p>
</body>
</html>