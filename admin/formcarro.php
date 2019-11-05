<?php
// Bootstrap
require_once("./classes/Bootstrap.php");
// Entidades
require_once("classes/entidades/Carro.php");
// Core
$core = $bootstrap->getCore();

// Repositories
//// Pega todos os pacotes
$carroRepository = $bootstrap->getRepositorioCarro();


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

        <form method="POST" >
            <div class="form-group">
                <label for="nome">Nome: </label>
                <input class="form-control" type="text" name="nome" id="nome" value<?= $_POST['nome'];?> placeholder="Digite o nome do carro"><br><br>
            </div>

            <div class="form-group">
                <label for="ano">Ano: </label>
                <input class="form-control" type="date" name="ano" id="ano" value<?= $_POST['ano'];?> placeholder="Escolha o ano do carro"><br><br>
            </div>

            <div class="form-group">
                <label for="marca">Marca: </label>
                <input class="form-control" type="text" name="marca" id="marca" value<?= $_POST['marca'];?> placeholder="Digite a marca do carro"><br><br>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem: </label>
                <input class="form-control" type="file" name="imagem" id="imagem" <?= $_POST['imagem'];?> placeholder="Insira a imagem do carro"><br><br>
            </div>


            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
</body>
</html>

<?php
$data = [];
$carro_entity = new Carro();
$data["nome"] = $carro_entity->setNome($_POST["nome"]);
$data["marca"] = $carro_entity->setMarca($_POST["marca"]);
$data["imagem"] = $carro_entity->setImagem($_POST["imagem"]);
//$data["ano"] = $carro_entity->setAno($_POST["ano"]);
$carros = $carroRepository->createCarro($data);
?>
