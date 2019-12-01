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
echo $core->getNavBar();
?>

<div class="container my-4">
    <div class="row my-3 d-flex align-items-center">
        <h4 class="col-8">
            Atualmente, temos <?=count($pacotes)?> planos disponíveis!
        </h4>
        <a
            href="pesquisa.html"
            class="col-4 btn btn-link text-center"
        >
            Ver meus alugueis
        </a>
    </div>
    <div class="row">
        <?php
            foreach ($pacotes as $pacote) {
                ?>
                <div class="col-4">
                    <div class="card border-dark">
                        <div class="card-body">
                            <h4 class="card-title text-dark font-weight-bold"><?=$pacote->getNome()?></h4>
                            <div class="row px-3 pt-3 d-flex justify-content-between">
                                <h5 class="card-text text-italic text-success text-bold">
                                    R$ <?=$pacote->getValor()?>
                                </h5>
                                <h5 class="card-text text-info">
                                    <?=$pacote->getPeriodo()?>
                                </h5>
                            </div>
                        </div>
                        <ul class="list-group">
                            <a
                                class="list-group-item list-group-item-action list-group-item-success text-center h4"
                                href="pacote.php?pacote=<?=$pacote->getID()?>"
                            >
                                Escolha seu veiculo
                            </a>
                        </ul>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>
