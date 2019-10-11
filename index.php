<?php

// Pega a classe de banco de daos
require_once("classes/DBConnection.php");


// Faz uma query para todos os pacotes
$pacotes = $db->getQuery("select * from pacote");

// loop para pecorrer todos os pacotes
foreach ($pacotes as $pacote) {
    $pacote->id;
}
