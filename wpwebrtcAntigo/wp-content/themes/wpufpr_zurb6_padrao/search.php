<?php get_header(); ?> <!-- Mostrar o cabeçalho -->
	
<!--
*********************************************************
*              Inicio do Conteúdo principal             *
*********************************************************
-->	
<div id="conteudo" class="row">
<!-- Tem coluna esquerda e não tem direita -->
<?php 
	if ( is_active_sidebar('esquerda') && !is_active_sidebar('direita')) { 
	     include (TEMPLATEPATH . '/sidebar-esquerda.php'); 
?>
	<div class="colesq small-9 large-9 columns centered"> <!-- Somente coluna esquerda, então a coluna central terá 9 colunas ZURB Foundation -->

<!-- Tem coluna direita e esquerda -->
<?php 
	} elseif ( is_active_sidebar('esquerda') && is_active_sidebar('direita')) { 
		include (TEMPLATEPATH . '/sidebar-esquerda.php'); 
?>
	<div class="diresq small-3 large-6 columns centered"> <!-- Tem coluna esquerda e direita, então a coluna central terá 6 colunas ZURB Foundation -->

<!-- Tem coluna direita e não tem esquerda -->
<?php } elseif ( !is_active_sidebar('esquerda') && is_active_sidebar('direita')) {
?>
	<div class="coldir small-9 large-9 columns centered"> 

<!-- Não tem colunas: esquerda nem direita -->
<?php } else { ?>
	<div class="small-12 large-12 columns centered"> <!-- Não tem colunas laterais, então a coluna única terá 12 colunas ZURB Foundation -->
<?php }?>

	<h3>Resultados da pesquisa</h3>

<!--
*********************************************************
*     Loop do Wordpress para mostrar o conteudo dos     *
*       posts/notícias usando o ZURB Foundation 4       *
*********************************************************
-->	
	<?php if (have_posts()) : ?>


		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> <!-- Mostra o título do post/notícia -->

				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

				<div>

					<?php the_excerpt(); ?> <!-- Mostra o resumo do post/notícia -->

				</div>

			</div>

		<?php endwhile; ?>

<!--
*********************************************************
*                  Plugin WP_PAGENAVI                   *
*   Mostra a paginação se este plugin estiver ativado   *
*********************************************************
-->	
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	
	<?php else : ?>

		<h5>{ Nenhuma publica&ccedil;&atilde;o encontrada... }</h5>
		
	<?php endif; ?> <!-- Fim dos posts do conteudo -->


	</div><!-- final da div central criada a partir dos testes de condicoes de colunas -->

	<!-- Mostra o conteúdo da coluna direita, se existir... -->

<?php if(is_active_sidebar('direita')) { ?>
	<?php include (TEMPLATEPATH . '/sidebar-direita.php' ); ?>
<?php } ?>

</div> <!-- Fecha a ROW #conteudo aberto no inicio deste arquivo -->

<?php get_footer(); ?> <!-- Mostrar o rodapé -->