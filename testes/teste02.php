<?php

require_once ("../classes/Core.php");

class BootstrapTest {
    public function getCore() {
        $core = Core::getInstance();
        return $core;
    }
}


$bootstrapTest = new BootstrapTest();

$getCore1 = $bootstrapTest->getCore();
$getCore2 = $bootstrapTest->getCore();

$testeCore = $getCore1 === $getCore2;
echo "São duas instâncias iguais? ";
if ($testeCore) {
    echo "Sim";
} else {
    echo "Não";
}

echo "<br>";
echo "<pre>".var_dump($testeCore)."</pre>";