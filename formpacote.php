<?php
// Bootstrap
require_once("classes/Bootstrap.php");
// Entidades
require_once("classes/entidades/Pacote.php");
// Core
$core = $bootstrap->getCore();

// Repositories
//// Pega todos os pacotes
$pacoteRepository = $bootstrap->getRepositorioPacote();

$nome = $_POST["nome"] ?? "";
$valor = $_POST["valor"] ?? "";
$periodo = $_POST["periodo"] ?? "";


$pacote_entity = new Pacote();
$pacote_entity->setNome($nome);
$pacote_entity->setValor($valor);
$pacote_entity->setPeriodo($periodo);
$pacoteRepository->createPacote($pacote_entity);

$carro_tipo_all = selectAllTipoCarro();

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
    <h5 class="card-header">Cadastrar pacote</h5>
    <div class="card-body">

<form method="POST" >
    <div class="form-group">
    <label for="nome">Nome: </label>
    <input class="form-control" type="text" name="nome" id="nome" value<?=$carro_entity->getNome();?> placeholder="Digite o nome do pacote"><br><br>
    </div>

    <div class="form-group">
    <label for="valor">Valor: </label>
    <input class="form-control" type="number" name="valor" id="valor" value<?= $carro_entity->getValor();?> placeholder="Digite o valor do pacote"><br><br>
    </div>

    <div class="form-group">
    <label>periodo: </label>
    <input class="form-control" type="number" name="periodo" value<?= $carro_entity->getPeriodo();?> placeholder="Digite a quantidade de dias do periodo"><br><br>
    </div>


    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
    </div>
</div>
</body>
</html>

<?php
$pacote_entity = new Pacote();
$pacote_entity->setNome($_POST["nome"]);
$pacote_entity->setValor($_POST["valor"]);
$pacote_entity->setPeriodo($_POST["periodo"]);
$pacoteRepository->createPacote($pacote_entity);
?>
