<?php
// Bootstrap
require_once("classes/Bootstrap.php");
// Entidades
require_once("classes/entidades/Carro.php");
require_once("classes/entidades/TipoCarro.php");
// Core
$core = $bootstrap->getCore();

// Repositories
//// Pega todos os pacotes
$carroRepository = $bootstrap->getRepositorioCarro();

$nome = $_POST["nome"] ?? "";
$marca = $_POST["marca"] ?? "";
$imagem = $_POST["imagem"] ?? "";
$ano = $_POST["ano"] ?? "";


$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);
$carro_entity -> setAno($ano);

$alert = null;
$erro = $carro_entity.validate();
if (!$erro) {
    $carroRepository->createCarro($carro_entity);
    $alert = "Carro criado";
} else {
    $alert = $erro;
}


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
    <h5 class="card-header">Cadastrar o carro</h5>
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
                <input class="form-control" type="text" name="nome" id="nome" value<?=$carro_entity->getNome();?> placeholder="Digite o nome do carro"><br><br>
            </div>

            <div class="form-group">
                <label for="ano">Ano: </label>
                <input class="form-control" type="date" name="ano" id="ano" value<?=$carro_entity->getAno()?>> placeholder="Escolha o ano do carro"><br><br>
            </div>

            <div class="form-group">
                <label for="marca">Marca: </label>
                <input class="form-control" type="text" name="marca" id="marca" value<?= $carro_entity->getMarca();?> placeholder="Digite a marca do carro"><br><br>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem: </label>
                <input class="form-control" type="file" name="imagem" id="imagem" <?= $carro_entity->getImagem();?> placeholder="Insira a imagem do carro"><br><br>
            </div>


            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
</body>
</html>

<?php

?>
