<?php
// Bootstrap
require_once("./classes/Bootstrap.php");

$id_pacote = $_GET["pacote"] ?? null;
$id_carro = $_GET["carro"] ?? null;

// Core
$core = $bootstrap->getCore();

// Repositorios
$repositorioCarro = $bootstrap->getRepositorioCarro();
$repositorioPacote = $bootstrap->getRepositorioPacote();

if (!$id_pacote && !$id_carro) {
    header("Location: index.php");
}

$carro = $repositorioCarro->selectCarro($id_carro);
$pacote = $repositorioPacote->selectPacote($id_pacote);


// Setar o cabeçalho
echo $core->setHeader("Inicio");
?>
<nav class="navbar navbar-dark bg-dark" style="display: flex; justify-content: center;">
    <img src="https://imagensemoldes.com.br/wp-content/uploads/2018/01/Logo-Filme-Carros-01.png" alt="" width=50px
         heigth=50px>
</nav>

<div class="container p-5">
        <h3 class="mb-4">Dados do Aluguel</h3>
        <div class="row">
            <div class="form-group col-6">
                <label>Plano</label>
                <span class="input-group-text" id="inputGroup-sizing-default"><?=$pacote->getNome()?></span>
            </div>
            <div class="form-group col-6">
                <label>Preço do pacote</label>
                <span class="input-group-text" id="inputGroup-sizing-default">R$: <?=$pacote->getValor()?></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <div class="form-group">
                    <label>Carro</label>
                    <span class="input-group-text" id="inputGroup-sizing-default"><?=$carro->getNome()?></span>
                </div>
            </div>
            <div class="form-group col-6">
                <div class="form-group">
                    <label>Tipo</label>
                    <span class="input-group-text" id="inputGroup-sizing-default"><?=$carro->getTipoCarro()->getNome()?></span>
                </div>
            </div>
        </div>

        <form>
            <h4 class="mb-4">Confirme seus dados</h4    >
            <div class="form-group">
                <label>Nome</label>
                <input type="name" class="form-control" placeholder="Ex Pen Blue">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="dragonballgt@gmail.com">
            </div>
            <div class="form-group">
                <label>Cartão</label>
                <input type="text" class="form-control" placeholder="4000000000000000000000000">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>CPF</label>
                    <input type="text" class="form-control" placeholder="02558558525">
                </div>
                <div class="form-group col-md-6">
                    <label>Telefone</label>
                    <input type="text" class="form-control"  placeholder="71982509571">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Alugar</button>
        </form>
</div>