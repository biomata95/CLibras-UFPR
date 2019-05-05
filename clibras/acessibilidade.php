<?php
/*
Template Name: Acessibilidade
*/
?>
<?php get_header(); ?> <!-- Mostrar o cabecalho -->

<?php 

	$sitio = get_bloginfo( 'name' );  
	$titulo='<strong>Este portal da "' . $sitio . '" segue o modelo de identidade digital padr&atilde;o do governo federal, que atende &agrave;s principais recomenda&ccedil;&otilde;es de acessibilidade indicadas para web</strong><br><hr>';
	$rodape = '<div class="callout secondary">Ajude-nos a disponibilizar um site cada vez mais acess&iacute;vel.<br> Caso encontre algum problema de acessibilidade, ou tenha sugest&atilde;o de melhoria, entre em contato pelo e-mail: webdesign@ufpr.br</div>';
?>
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
				<?php echo $titulo; ?>

				<?php the_content(); ?><!-- Mostra o conteúdo da pagina -->

				<?php echo $rodape; ?>

			</div>

		</div><!-- Final da div dentro do loop que mostra o conteudo da pagina -->
		
		<?php endwhile; endif; ?> 
<!-- Final do loop do Wordpress -->
	</div> <!-- Final da div da coluna principal da pagina -->

</div><!-- Fechamento #row #conteudo -->

<?php get_footer(); ?> <!-- Mostrar o rodape -->