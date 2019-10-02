<?php
const PACOTE_INVALIDO = "pacote_invalido";

// Pega a classe de banco de dados
require_once("classes/Database.php");

// Pega a instância unica do banco
$con = $db->getDatabase();

// Pega o id do pacote ou define como inválido
$id_pacote = $_GET["pacote_id"] ?? PACOTE_INVALIDO;

// Redireciona caso seja invalido
if ($id_pacote === PACOTE_INVALIDO) {
    header("Location: pacote.php");
}

// Faz uma query para buscar no banco o carro de acordo com o pacote escolhido
$query = $con->query("SELECT c.id,c.nome FROM carro AS c INNER JOIN pacote AS p ON c.id_tipo = p.id_tipo WHERE p.id = ?");
$query->bindParam(1, $id_pacote);
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




