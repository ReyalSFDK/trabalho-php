<?php

// Pega a classe de banco de daos
require_once("classes/Database.php");

// Pega a instância unica do banco
$con = $db->getDatabase();

// Faz uma query para todos os pacotes
$query = $con->query("select * from pacote");

// Armazeno os pacores em um array
$pacotes = $query->fetch(PDO::FETCH_OBJ);

// loop para pecorrer todos os pacotes
foreach ($pacotes as $pacote) {
    $pacote->id;
}
