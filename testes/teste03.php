<?php

require_once("../classes/entidades/Carro.php");

function validate(Carro $carro, string $numTeste, bool $testResult) {
    $validaçãoTeste = $carro->validate();

    if (!boolval($validaçãoTeste) === $testResult) {
        echo "Teste $numTeste não teve falhas ";
        echo "<br>";
    } else {
        echo "Teste $numTeste teve falha";
    }
    echo "<br>";
}

echo "<pre>";

// Teste 1
// Testar validação do carro
// Verifica se um carro vazio é válido
$testeCarro1 = new Carro();

validate($testeCarro1, "01", false);

// Teste2
// Testar se o carro pode ter um nome com mais de 50 caracteres
// Foram passados 64 caracteres
$testeCarro2 = new Carro();
$testeCarro2->setNome("akisgsnddhashdasdhçashafhashfaskfhasfihasfhajsfhkajshfjashfasçfh");
validate($testeCarro2, "02", false);

// Teste3
// Testar se a validação aceita o nome "Carro", sem outros valores
$testeCarro3 = new Carro();
$testeCarro3->setNome("Carro");
validate($testeCarro3, "03", false);

// Teste4
// Testar se a validação aceita o nome "Carro", com a marca "", sem outros valores
$testeCarro4 = new Carro();
$testeCarro4->setNome("Carro");
$testeCarro4->setMarca("");
validate($testeCarro4, "04", false);

// Teste5
// Testar se a validação aceita o nome "Carro", com a marca "", imagem ""
$testeCarro5 = new Carro();
$testeCarro5->setNome("Carro");
$testeCarro5->setMarca("");
$testeCarro5->setImagem("");
validate($testeCarro5, "05", false);

// Teste6
// Testar se a validação aceita o nome "Carro", com a marca "Marca", imagem ""
$testeCarro6 = new Carro();
$testeCarro6->setNome("Carro");
$testeCarro6->setMarca("Marca");
$testeCarro6->setImagem("");
validate($testeCarro6, "06", false);

// Teste7
// Testar se a validação aceita o nome "Carro", com a marca "Marca", imagem "image"
$testeCarro7 = new Carro();
$testeCarro7->setNome("Carro");
$testeCarro7->setMarca("Marca");
$testeCarro7->setImagem("image");
validate($testeCarro7, "07", true);

// Teste7
// Testar se a validação aceita o nome "Carro",
// com a marca "Marcassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", imagem "image"
$testeCarro8 = new Carro();
$testeCarro8->setNome("Carro");
$testeCarro8->setMarca("Marca");
$testeCarro8->setImagem("image");
validate($testeCarro8, "08", false);


