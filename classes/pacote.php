<?php
const PACOTE_INVALIDO = "pacote_invalido";

// Pega a classe de banco de daos
require_once("classes/Database.php");

// Pega a instância unica do banco
$con = $db->getDatabase();

// Pega o pacote ou define como inválido
$id_pacote = $_GET["pacote"] ?? PACOTE_INVALIDO;

// Redireciona caso seja invalido
if ($id_pacote === PACOTE_INVALIDO) {
    header("Location: index.php");
}

// Faz uma query para buscar no banco o pacote
$query = $con->query("SELECT * FROM pacote WHERE id = ?");
$query->bindParam(1, $id_pacote);
$query->execute();

if ($query->rowCount() < 1) {
    header("Location: index.php");
}

$pacote = $query->fetch(PDO::FETCH_OBJ);

$pacote->id;




