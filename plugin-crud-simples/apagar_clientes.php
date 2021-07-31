<?php

function apagar_clientes(){

	
	if(isset($_GET['id'])){
	
		global $wpdb;		
				
		$table_name = $wpdb->prefix . 'clientes';
		
		$id = $_GET['id'];
		
		$wpdb->delete(
			$table_name,			
			array(
				'id'=>$id
			)
		);
		echo "Cliente Apagado!";

		//wp_redirect( admin_url('admin.php?page=listar_clientes'),301 );
		
		//echo '<meta http-equiv="refresh" content="0; url='.admin_url('admin.php?page=listar_clientes').'" />';
	}
	
}