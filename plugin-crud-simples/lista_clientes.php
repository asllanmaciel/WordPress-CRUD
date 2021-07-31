<?php

function lista_clientes(){
	
	?>
		<style>
        table {
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
		</style>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Telefone</th>
				</tr>
			</thead>
			<tbody>
			<?php
				
				global $wpdb;
				$table_name = $wpdb->prefix . 'clientes';
				
				$clientes = $wpdb->get_results("SELECT * FROM $table_name");
				
				foreach($clientes as $cliente){
					
					echo '<tr>';
						echo '<td>'.$cliente->id.'</td>';
						echo '<td>'.$cliente->nome.'</td>';
						echo '<td>'.$cliente->email.'</td>';
						echo '<td>'.$cliente->telefone.'</td>';
						
						echo '<td><a href="'. admin_url('admin.php?page=atualizar_clientes&id='.$cliente->id) .'">EDITAR</a></td>'; //http://localhost/wordpress/wp-admin/admin.php?page=atualizar_clientes
						echo '<td><a href="'. admin_url('admin.php?page=apagar_clientes&id='.$cliente->id) .'">APAGAR</a></td>';
						
					echo '</tr>';
					
				}
				
			?>
			</tbody>
		</table>
	
	<?php
	
}