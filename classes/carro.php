<?php
const PACOTE_INVALIDO = "pacote_invalido";

// Pega a classe de banco de dados
require_once("classes/Database.php");

// Pega a instância unica do banco
$con = $db->getDatabase();

// Pega o id do pacote
$id_pacote = $_GET["pacote"];

// Pega o id do pacote ou define como inválido
$id_pacote = $_GET["pacote"] ?? PACOTE_INVALIDO;

// Redireciona caso seja invalido
if ($id_pacote === PACOTE_INVALIDO) {
    header("Location: index.php");
}

// Faz uma query para buscar no banco o tipo de carro no pacote
$query = $con->query("SELECT id_tipo FROM pacote WHERE id = ?");
$query->bindParam(1, $id_pacote);
$query->execute();

if ($query->rowCount() < 1) {
    header("Location: pacote.php");
}

$tipo_carro = $query->fetch(PDO::FETCH_OBJ);

$tipo_carro_id = $tipo_carro->id_tipo;

// Faz uma query para buscar no banco o carro
$query = $con->query("SELECT id,nome FROM carro WHERE id_tipo = ?");
$query->bindParam(1, $tipo_carro_id);
$query->execute();

if ($query->rowCount() < 1) {
    header("Location: pacote.php");
}

$rows = $query->fetchAll();

// Pega os dados das colunas da tabela do banco
foreach ($rows as $row) {

    $carro_id = $row["id"];
    $carro_nome = $row["nome"];

}




