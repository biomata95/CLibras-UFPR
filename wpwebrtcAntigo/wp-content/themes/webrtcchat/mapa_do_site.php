<?php
/*
Template Name: Mapa do site
*/
?>

<?php get_header(); ?> <!-- Mostrar o cabecalho -->

<div id="conteudo" class="row">
	<div class="small-12 medium-offset-1 medium-10 large-offset-1 large-10 columns">

<!--
*********************************************************
*       Exibe o Mapa do site criado a partir de um      *
*                   menu personalizado                  *
*********************************************************
-->	
        <h2><?php the_title(); ?> </h2>
           
            <?php 
            if ( has_nav_menu( 'mapa_do_site' ) ) {
            	wp_nav_menu( array( 'theme_location' 	=> 'mapa_do_site', 
            						'container_class' 	=> 'mapa_do_site', 
            						'before'			=>	'<span style="display: inline-block; color: #999"><i class="icon_folder-open_alt" aria-hidden="true"></i>',
            						'after'				=> '</span>') );
            } ?> 

<!-- Final do loop do Wordpress -->
	</div> <!-- Final da div da coluna principal da pagina -->

<!-- Mostra o conteúdo da coluna direita, se existir... -->
	
    <?php //include (TEMPLATEPATH . '/sidebar-direita.php' ); ?>

</div><!-- Fechamento #row #conteudo -->

<?php get_footer(); ?> <!-- Mostrar o rodape -->