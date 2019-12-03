<?php
// Bootstrap
require_once("classes/Bootstrap.php");
// Entidades
require_once("classes/entidades/TipoCarro.php");
// Core
$core = $bootstrap->getCore();

// Repositories

$tipoCarroRepository = $bootstrap->getRepositorioTipoCarro();



$nome = $_POST["nome"] ?? "";


$tipo_carro_entity = new TipoCarro();
$tipo_carro_entity->setNome($nome);


$alert = null;
$erro = $tipo_carro_entity->validate();
if (!$erro) {
    $tipoCarroRepository->createTipoCarro($tipo_carro_entity);
    $alert = "Tipo do carro criado";
} else {
    $alert = $erro;
}

//var_dump($carro_entity);
echo $core->setHeader("Inicio");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>'. $title.'</title>
</head>
<body>
<div class="card">
    <h5 class="card-header">Cadastrar o tipo do carro</h5>
    <div class="card-body">

        <?php
        if ($alert) {
            ?>
            <div class="alert alert-light"><?+$alert?></div>
            <?php
        }
        ?>
        <form method="POST" >
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input class="form-control" type="text" name="nome" id="nome" value<?=$tipo_carro_entity->getNome();?> placeholder="Digite o nome do tipo do carro"><br><br>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
</body>
</html>




