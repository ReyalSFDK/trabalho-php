<?php

// Bootstrap
require_once("./classes/Bootstrap.php");

// Repositories
$tipoCarroRepository = $bootstrap->getRepositorioTipoCarro();

$tiposCarro = $tipoCarroRepository->selectAllTipoCarro();

?>

<pre><?=var_dump($tiposCarro)?></pre>