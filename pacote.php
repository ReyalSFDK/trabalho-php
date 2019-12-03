<?php
// Bootstrap
require_once("./classes/Bootstrap.php");

// Pega o id do pacote
$id_pacote = $_GET["pacote"] ?? null;

// Core
$core = $bootstrap->getCore();

// Repositories
$pacoteRepository = $bootstrap->getRepositorioPacote();
$carroRepository = $bootstrap->getRepositorioCarro();

$pacote = null;

if ($id_pacote) {
  $pacote = $pacoteRepository->selectPacote($id_pacote);
}

if (!$pacote) {
  header('Location: index.php');
}

// Pega os carros do pacote
$carros = $carroRepository->selectAllCarrosInPacote($pacote);

// Setar o cabeçalho
echo $core->setHeader("Pacote - " . $pacote->getNome());

echo $core->getNavBar();
?>




<div class="container" style="margin-top:35px;">
    <div class="row">
      <div class="col-12">
        <div class="card bg-primary">
          <h4 class="card-header text-bold text-white"><?=$pacote->getNome()?></h4>
          <ul class="list-group list-group-flush">
            <li
              class="list-group-item"
            >
              <div class="row  mt-2">
                <h5 class="col-10 text-info">Periodo da locação - <?=$pacote->getPeriodo()?></h5>
                <h5 class="col-2 text-center text-success text-bold">R$ <?=$pacote->getValor()?></h5>
              </div>
            
            </li>
            <?php
              foreach ($carros as $carro) {
              ?>
                <li
                  class="list-group-item"
                >
                  <div class="row d-flex align-items-center">
                    <h5
                      class="col-10 text-dark mt-3"
                    >
                      <?=$carro->getNome()?>
                    </h5>
                    <a
                      class="col-2 btn btn-success"
                      href="pacotecarro.php?pacote=<?=$pacote->getId()?>&carro=<?=$carro->getId()?>"
                    >
                      comprar
                    </a>
                  </div>

                </li>
                <?php
              }
            ?>
            <a href="index.php" class="list-group-item list-group-item-action text-center py-3 h5">
              Escolher outro pacote
            </a>
          </ul>
        </div>
      </div>

    </div>

  </div>
</div>

?>
