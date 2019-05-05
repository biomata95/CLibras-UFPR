<?php get_header(); ?> <!-- Mostrar o cabeçalho -->

<div id="conteudo" class="row">
	<div class="small-12 columns"> <!-- Não tem colunas laterais, então a coluna central terá span-22 -->

    <!--
*********************************************************
*     Loop do Wordpress para mostrar o conteudo dos     *
*        posts/notícias usando ZURB Foundation 6        *
*********************************************************
-->	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div> <!-- div loop wordpress -->
			
			<h2><?php the_title(); ?></h2> <!-- Mostra o título do post/notícia -->
			
           <div class="conteudo_post">
				<?php the_content(); ?> <!-- Mostra o conteúdo do post/notícia -->

				<?php wp_link_pages(array('before' => 'P&aacute;ginas: ', 'next_or_number' => 'n&uacute;mero')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>

			</div>
			
			<?php edit_post_link('Editar','','.'); ?>
			
		</div><!-- Final da div dentro do loop que mostra o conteudo dos posts/notícias -->

	<?php endwhile; endif; ?>
<!-- Final do loop do Wordpress -->
	</div> <!-- Final da div da coluna principal da página -->

</div><!-- Fechamento #row #conteudo -->

<?php get_footer(); ?> <!-- Mostrar o rodapé -->