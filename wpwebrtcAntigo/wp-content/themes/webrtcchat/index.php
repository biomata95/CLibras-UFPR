<!-- Carrega o arquivo header.php -->
<?php get_header(); ?>

<link rel="stylesheet" href="wp-content/themes/webrtcchat/css/videochat.css">
<link rel="stylesheet" href="wp-content/themes/webrtcchat/css/main.css">

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
	<!--
    <div id="videoLocal" class="small-12 medium-12 large-12 columns centered">
        <h5>Local</h5>
        <video id="video1" autoplay muted></video>
    </div>
    <div id="videoRemoto" class="small-12 medium-12 large-12 columns centered">
        <h5>Remoto</h5>
        <video id="video2" autoplay></video>
    </div>
    <br>
    <div id="videoRemoto2" class="small-12 medium-12 large-12 columns centered">
        <h5>Remoto 2</h5>
        <video id="video3" autoplay></video>
    </div>
    <div>
        <button id="startButton">Iniciar</button>
        <button id="callButton">Chamar</button>
        <button id="hangupButton">Pausar</button>
    </div>
    -->
    <h5 id="localLabel">Local</h5>
    <video id="video1" autoplay muted></video>
    <h5 id="remotoLabel">Remoto</h5>
    <video id="video2" autoplay></video>
    <h5 id="remoto2Label">Remoto 2</h5>
    <video id="video3" autoplay></video>
    
    
    <div>
      <button id="startButton">Start</button>
      <button id="callButton">Call</button>
      <button id="hangupButton">Hang Up</button>
    </div>

</div> <!-- #conteudo -->

<script src="wp-content/themes/webrtcchat/js/adapter-latest.js"></script>
<script src="wp-content/themes/webrtcchat/js/common.js"></script>
<script src="wp-content/themes/webrtcchat/js/main.js"></script>

<script src="wp-content/themes/webrtcchat/js/lib/ga.js"></script>

<?php get_footer(); ?>

