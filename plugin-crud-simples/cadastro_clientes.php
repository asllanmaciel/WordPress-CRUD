<?php

function cadastro_clientes(){
	
	echo "<h3>Cadastro de Clientes...</h3>";
	?>
	
	<form name="cadastro" action="#" method="post">
	
		<div>
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome">
		</div>
		
		<div>
			<label for="email">E-mail:</label>
			<input type="text" name="email" id="email">
		</div>
		
		<div>
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone">
		</div>
		
		<div>
			<input type="submit" value="Cadastrar!" name="cad">
		</div>
	
	</form>
	
	
	<?php
	
	if(isset($_POST['cad'])){
	
		global $wpdb;
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		
		$table_name = $wpdb->prefix . 'clientes';
		
		$wpdb->insert(
			$table_name,
			array(
				'nome' => $nome,
				'email' => $email,
				'telefone' => $telefone
			)		
		);
		echo "Cliente Cadastrado!";	
	}
	
}