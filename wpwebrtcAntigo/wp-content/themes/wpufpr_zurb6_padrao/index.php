<!-- Carrega o arquivo header.php -->
<?php get_header(); ?>

<!-- Início conteúdo principal da página usando ZURB CSS -->

<div id="conteudo" class="row fundo_branco">

<!--
*********************************************************
*                   Conteúdo principal                  *
*********************************************************
-->	

	<div id="noticia" class="small-12 medium-12 large-12 columns centered">
				
				<?php
				$args = array(
						'post_type' => 'post',
						'posts_per_page' => 2,
						'orderby' =>'date',
						'order' => 'DESC'
						);

					$loop = new WP_Query($args);
					while ( $loop->have_posts() ) : $loop->the_post(); 					
				?>
					
					<h2> <?php the_title(); ?> </h2> 
					<p>  <?php the_content(); ?> </p>

				<?php
					endwhile; 
				?>

	</div> <!-- #row -->
	
</div> <!-- #conteudo -->
<?php get_footer(); ?>