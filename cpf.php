<?php
// Bootstrap
require_once("./classes/Bootstrap.php");

// Core
$core = $bootstrap->getCore();

// Setar o cabeçalho
echo $core->setHeader("Inicio");

?>
<nav class="navbar navbar-dark bg-dark" style="display: flex; justify-content: center;">
    <img src="https://imagensemoldes.com.br/wp-content/uploads/2018/01/Logo-Filme-Carros-01.png" alt="" width=50px
        heigth=50px>
</nav>



<div class="container" style="margin-top:35px;">
<h5 class="card-title d-flex justify-content-center">Verifique se já possui um aluguel ativo conosco</h5>

    <div class="col-12  d-flex justify-content-center">
        <div class="card border-dark">
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">CPF</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Exemplo do tamanho do input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <p class="card-text"></p>
            </div>
            <ul class="list-group">
                <li class="list-group-item list-group-item-action list-group-item-success text-center h4">Ver meus
                    aluguéis</li>
            </ul>
        </div>
    </div>
    ?>