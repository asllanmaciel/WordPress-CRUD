<?php
/**
 * Template Name: Modelo DB
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header alignwide">
			<?php //get_template_part( 'template-parts/header/entry-header' ); ?>
		</header><!-- .entry-header -->

	<div class="entry-content">
		<?php

		$con = mysqli_connect('localhost','root','','test_082021_2');

		if($con === false){
			die("Erro: Não conectou. " . mysqli_connect_error());
		}else{
			//echo 'Conectado!';
		}

		switch($_GET['acao']){

			//CREATE
			case 'criar':
				require('criar.php');
			break;
			
			//READ
			case 'ver':
				require('ver.php');
			break;

			//UPDATE
			case 'editar':
				require('editar.php');
			break;

			//DELETE
			case 'excluir':
				require('excluir.php');
			break;

			case 'erro':
				require('erro.php');
			break;

			default:
				require('lista.php');

		}
		
		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width"></footer>
</article><!-- #post-<?php the_ID(); ?> -->


<?php

get_footer();
