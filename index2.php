<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>
	</head>
	<body>
		<h1>Cadastrar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="processa.php">
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo"><br><br>
			
			<label>CPF: </label>
			<input type="number" name="cpf" placeholder="Digite o seu cpf"><br><br>


            <label>Telefone: </label>
            <input type="number" name="telefone" placeholder="Digite o seu numero de telefone"><br><br>

			<input type="submit" value="Cadastrar">
		</form>
	</body>
</html>