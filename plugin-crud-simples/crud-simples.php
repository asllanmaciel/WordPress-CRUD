<?php
 /**
 * Plugin Name:       CRUD
 * Plugin URI:        https://wp24horas.com.br
 * Description:       Plugin para Gestão de Clientes com CRUD
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Asllan Maciel
 * Author URI:        https://asllanmaciel.com.br
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://wp24horas.com.br/crud-plugin
 * Text Domain:       crud-plugin
 * Domain Path:       /languages
 */

 global $at_db_version;
 $at_db_version = '1.0';
 
 function crud_table(){
	 
	 global $wpdb;
	 global $at_db_version;
	 
	 $table_name = $wpdb->prefix . 'clientes';
	 
	 $charset_collate = $wpdb->get_charset_collate();
	  
	 $sql = "CREATE TABLE $table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				nome varchar(255) DEFAULT '' NOT NULL,
				email varchar(100) DEFAULT '' NOT NULL,
				telefone varchar(15) DEFAULT '' NOT NULL,
				UNIQUE KEY id(id)
			) $charset_collate;
	 "; 
	 
	 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	 
	 dbDelta($sql);
	 
	 add_option('at_db_version','$at_db_version');
	 
 }
 
 register_activation_hook(__FILE__, 'crud_table');
 
 function crud_menu(){
	 
	 add_menu_page('lista_clientes',
			'Clientes',
			'manage_options',
			'lista_clientes',
			'lista_clientes'
	 );
	 add_submenu_page('lista_clientes',
			'cadastro_clientes',
			'Cadastro de Clientes',
			'manage_options',
			'cadastro_clientes',
			'cadastro_clientes'
	 );
	 add_submenu_page('lista_clientes',
			'atualizar_clientes',
			'Atualização de Clientes',
			'manage_options',
			'atualizar_clientes',
			'atualizar_clientes'
	 );
	 add_submenu_page('lista_clientes',
			'apagar_clientes',
			'Apagar Clientes',
			'manage_options',
			'apagar_clientes',
			'apagar_clientes'
	 );
	 
	 
 }
 add_action('admin_menu','crud_menu');
 
 define('ROOTDIR', plugin_dir_path(__FILE__));
 require_once(ROOTDIR. 'lista_clientes.php');
 require_once(ROOTDIR. 'cadastro_clientes.php');
 require_once(ROOTDIR. 'atualizar_clientes.php');
 require_once(ROOTDIR. 'apagar_clientes.php');