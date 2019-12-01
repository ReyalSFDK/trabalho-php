<?php
// Bootstrap
require_once("classes/Bootstrap.php");
// Entidades
require_once("classes/entidades/Carro.php");
require_once("classes/entidades/TipoCarro.php");
require_once("classes/entidades/Pacote.php");

//Inserindo número no campo Nome

$nome = "1";
$marca = "Toyota";
$imagem = "imagem";

$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);

$erro = $carro_entity->validate();

if (!$erro){
    $erro = "Cadastro realizado com sucesso!";
}
echo $erro;

//Inserindo número no campo Marca

$nome = "Emanuel";
$marca = "1";
$imagem = "imagem";

$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);

$erro = $carro_entity->validate();
if (!$erro){
    $erro = "Cadastro realizado com sucesso!";
}


echo "<br>".$erro;


//Inserindo caractere especial no campo Marca

$nome = "Emanuel";
$marca = "&";
$imagem = "imagem";

$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);

$erro = $carro_entity->validate();
if (!$erro){
    $erro = "Cadastro realizado com sucesso!";
}
echo  "<br>".$erro;

//Inserindo caractere especial no campo Nome

$nome = "%";
$marca = "Toyota";
$imagem = "imagem";

$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);

$erro = $carro_entity->validate();
if (!$erro){
    $erro = "Cadastro realizado com sucesso!";
}
echo  "<br>".$erro;


//Inserindo campo Nome vazio 

$nome = "";
$marca = "Toyota";
$imagem = "imagem";

$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);

$erro = $carro_entity->validate();
if (!$erro){
    $erro = "Cadastro realizado com sucesso!";
}
echo  "<br>".$erro;

//Inserindo campo Modelo vazio 

$nome = "Emanuel";
$marca = "";
$imagem = "imagem";

$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);

$erro = $carro_entity->validate();
if (!$erro){
    $erro = "Cadastro realizado com sucesso!";
}
echo  "<br>".$erro;

//Inserindo campo Imagem vazio 
$nome = "Emanuel";
$marca = "Toyota";
$imagem = "";

$carro_entity = new Carro();
$carro_entity->setNome($nome);
$carro_entity->setMarca($marca);
$carro_entity->setImagem($imagem);

$erro = $carro_entity->validate();
if (!$erro){
    $erro = "Cadastro realizado com sucesso!";
}
echo  "<br>".$erro;

