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
    <form>
        <div class="form-group">
            <label>Nome</label>
            <input type="name" class="form-control" placeholder="Ex Ramon Martins">
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

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>

?>