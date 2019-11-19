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

//$pac = new Pacote();
//$pac->setNome("Nome");
//$pac->setValor("10");
//$pac->setPeriodo("1 dia");
//
//$pacoteRepository->createPacote($pac);
?>
<nav class="navbar navbar-dark bg-dark" style="display: flex; justify-content: center;">
    <img src="https://imagensemoldes.com.br/wp-content/uploads/2018/01/Logo-Filme-Carros-01.png" alt="" width=50px heigth=50px>
</nav>
<div class="container my-5">
    <div class="row">
        <?php
            foreach ($pacotes as $pacote) {
                ?>
                <div class="col-4">
                    <div class="card border-dark">
                        <div class="card-body">
                            <h4 class="card-title text-dark font-weight-bold">Premium </h4>
                            <p class="card-text text-italic">50 reais </p>
                            <p class="card-text"><?=$pacote->getPeriodo()?></p>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-action list-group-item-success text-center h4">Escolha seu veiculo</li>
                        </ul>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>

?>
