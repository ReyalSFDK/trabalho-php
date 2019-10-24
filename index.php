<?php
// Bootstrap
require_once("./classes/Bootstrap.php");

// Core
$core = $bootstrap->getCore();

// Repositories
//// Pega todos os pacotes
$pacoteRepository = $bootstrap->getRepositorioPacote();
$pacotes = $pacoteRepository->selectAllPacote();

// Setar o cabeçalho
echo $core->setHeader("Inicio");

$pac = new Pacote();
$pac->setNome("Nome");
$pac->setValor("10");
$pac->setPeriodo("1 dia");

$pacoteRepository->createPacote($pac);
?>

<div class="container my-5">
    <div class="row">
        <?php
            foreach ($pacotes as $pacote) {
                ?>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?=$pacote->getNome()?></h5>
                            <p class="card-text"><?=$pacote->getPeriodo()?></p>
                            <p class="card-text text-italic"><?=$pacote->getTipoCarro()->getNome()?></p>
                            <div class="row">
                                <button type="button" class="btn btn-success">Escolha seu veiculo</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>

?>
