<?php
// Bootstrap
require_once("./classes/Bootstrap.php");

// Core
$core = $bootstrap->getCore();

// Repositories
//// Pega todos os pacotes
$pacoteRepository = $bootstrap->getRepositorioPacote();
$pacotes = $pacoteRepository->selectPacote("01");

// Setar o cabeçalho
echo $core->setHeader("Inicio");

?>
<nav class="navbar navbar-dark bg-dark" style="display: flex; justify-content: center;">
    <img src="https://imagensemoldes.com.br/wp-content/uploads/2018/01/Logo-Filme-Carros-01.png" alt="" width=50px heigth=50px>
</nav>



<div class="container" style="margin-top:35px;">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <div class="col-16" style="margin-top:20px;">
              <div class="card" style="width: 100%;">

                <ul class="list-group list-group-flush">
                  <li class="list-group-item" style="display:flex; justify-content: space-between;">

                   
                      <h5>Sedan / SUV / PICKUP / HATCH</h5>
                   
    
                      <h5 style="padding: 10px">R$50,00</h5>
             
                  </li>
                  <li class="list-group-item" style="display:flex; justify-content: space-between;">
                      <p>SUV</p>

                    <div>
                      <button type="button" class="btn btn-success">comprar</button>

                    </div>
                  </li>
                  <li class="list-group-item" style="display:flex; justify-content: space-between;">
                    <p></p>
                    <button type="button" class="btn btn-success">comprar</button>
                  </li>
                </ul>

              </div>
            </div>

            <button type="button" class="btn btn-dark" style="margin-top: 2em">Retornar</button>
          </div>
        </div>
      </div>

    </div>

  </div>
  </div>

?>
