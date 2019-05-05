<?php get_header(); ?> <!-- Mostrar o cabecalho -->

<div id="conteudo" class="row">
	<div class="small-12 medium-offset-1 medium-10 large-offset-1 large-10 columns">

<!--
*********************************************************
*     Loop do Wordpress para mostrar o conteudo dos     *
*        posts/noticias usando ZURB Foundation 6        *
*********************************************************
-->	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div>

			<h2><?php the_title(); ?></h2><!-- Mostra o título da pagina -->

			<div> 
				<?php the_content(); ?><!-- Mostra o conteúdo da pagina -->

				<?php wp_link_pages(array('before' => 'P&aacute;ginas: ', 'next_or_number' => 'n&uacute;mero')); ?>

			</div>

		</div><!-- Final da div dentro do loop que mostra o conteudo da pagina -->
		
		<?php endwhile; endif; ?> 
<!-- Final do loop do Wordpress -->
	</div> <!-- Final da div da coluna principal da pagina -->

</div><!-- Fechamento #row #conteudo -->

<?php get_footer(); ?> <!-- Mostrar o rodape -->