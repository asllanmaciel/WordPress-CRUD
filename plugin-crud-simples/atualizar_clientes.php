<?php

function atualizar_clientes(){
	
	
	$id = $_GET['id'];
	global $wpdb;
	
	$table_name = $wpdb->prefix . 'clientes';
	
	$clientes = $wpdb->get_results("SELECT * FROM $table_name WHERE id=$id");
	
	echo "<h3>Atualização do Cliente ".$clientes[0]->nome."</h3>";
	
	?>
	
	<form name="cadastro" action="#" method="post">
	
		<input type="hidden" name="id" id="id" value="<?= $clientes[0]->id; ?>">
	
		<div>
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" value="<?= $clientes[0]->nome; ?>">
		</div>
		
		<div>
			<label for="email">E-mail:</label>
			<input type="text" name="email" id="email" value="<?= $clientes[0]->email; ?>">
		</div>
		
		<div>
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" value="<?= $clientes[0]->telefone; ?>">
		</div>
		
		<div>
			<input type="submit" value="Atualizar!" name="atl">
		</div>
	
	</form>	
	
	<?php
	
	if(isset($_POST['atl'])){
	
		global $wpdb;
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		
		$table_name = $wpdb->prefix . 'clientes';
		
		$wpdb->update(
			$table_name,
			array(
				'nome' => $nome,
				'email' => $email,
				'telefone' => $telefone
			),
			array(
				'id'=>$id
			)
		);
		echo "Cliente Atualizado!";	
	}
	
}