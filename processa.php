<?php
session_start();
include_once("conexao.php");

$nome = $_POST["nome"];
$cpf =$_POST["cpf"];
$telefone = $_POST["telefone"];


$result_usuario = "INSERT INTO usuarios (nome, cpf, telefone) VALUES ('$nome', '$email', '$cpf')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: index.php");
}
