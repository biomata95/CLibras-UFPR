<?php get_header(); ?> <!-- Mostrar o cabe�alho -->
	
<!--
*********************************************************
*              Inicio do Conte�do principal             *
*********************************************************
-->	
<div id="conteudo" class="row">
<!-- Tem coluna esquerda e n�o tem direita -->
<?php 
	if ( is_active_sidebar('esquerda') && !is_active_sidebar('direita')) { 
	     include (TEMPLATEPATH . '/sidebar-esquerda.php'); 
?>
	<div class="colesq small-9 large-9 columns centered"> <!-- Somente coluna esquerda, ent�o a coluna central ter� 9 colunas ZURB Foundation -->

<!-- Tem coluna direita e esquerda -->
<?php 
	} elseif ( is_active_sidebar('esquerda') && is_active_sidebar('direita')) { 
		include (TEMPLATEPATH . '/sidebar-esquerda.php'); 
?>
	<div class="diresq small-3 large-6 columns centered"> <!-- Tem coluna esquerda e direita, ent�o a coluna central ter� 6 colunas ZURB Foundation -->

<!-- Tem coluna direita e n�o tem esquerda -->
<?php } elseif ( !is_active_sidebar('esquerda') && is_active_sidebar('direita')) {
?>
	<div class="coldir small-9 large-9 columns centered"> 

<!-- N�o tem colunas: esquerda nem direita -->
<?php } else { ?>
	<div class="small-12 large-12 columns centered"> <!-- N�o tem colunas laterais, ent�o a coluna �nica ter� 12 colunas ZURB Foundation -->
<?php }?>

	<h3>Resultados da pesquisa</h3>

<!--
*********************************************************
*     Loop do Wordpress para mostrar o conteudo dos     *
*       posts/not�cias usando o ZURB Foundation 4       *
*********************************************************
-->	
	<?php if (have_posts()) : ?>


		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2> <!-- Mostra o t�tulo do post/not�cia -->

				<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

				<div>

					<?php the_excerpt(); ?> <!-- Mostra o resumo do post/not�cia -->

				</div>

			</div>

		<?php endwhile; ?>

<!--
*********************************************************
*                  Plugin WP_PAGENAVI                   *
*   Mostra a pagina��o se este plugin estiver ativado   *
*********************************************************
-->	
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	
	<?php else : ?>

		<h5>{ Nenhuma publica&ccedil;&atilde;o encontrada... }</h5>
		
	<?php endif; ?> <!-- Fim dos posts do conteudo -->


	</div><!-- final da div central criada a partir dos testes de condicoes de colunas -->

	<!-- Mostra o conte�do da coluna direita, se existir... -->

<?php if(is_active_sidebar('direita')) { ?>
	<?php include (TEMPLATEPATH . '/sidebar-direita.php' ); ?>
<?php } ?>

</div> <!-- Fecha a ROW #conteudo aberto no inicio deste arquivo -->

<?php get_footer(); ?> <!-- Mostrar o rodap� -->