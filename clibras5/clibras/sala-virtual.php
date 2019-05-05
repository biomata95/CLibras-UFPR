<!--
/*
Template Name: Sala-Chat
*/
-->


<!-- Início conteúdo principal da página usando ZURB CSS -->

<?php get_header(); ?> <!-- Mostrar o cabecalho -->

<style>
            .videoContainer {
                position: relative;
                width: 500px;
                height: 500px;
            }
            .videoContainer video {
                position: absolute;
                width: 100%;
                height: 100%;
            }
            .volume {
                position: absolute;
                left: 15%;
                width: 70%;
                bottom: 5px;
                height: 5px;
                display: none;
            }
            .connectionstate {
                position: absolute;
                top: 0px;
                width: 100%;
                text-align: center;
                color: #fff
            }
            #localScreenContainer {
                display: none;
            }
        </style>
    </head>

<div id="conteudo" class="row fundo_branco">

<!--
*********************************************************
*                   Conteúdo principal                  *
*********************************************************
-->	

	<div id="noticia" class="small-12 medium-12 large-12 columns centered">

    </div> <!-- #row -->

	
    <h3 id="title">Criar room</h3>

     <p id="subTitle"></p>
     <hr>
     <div class="videoContainer">
        <video id="localVideo"></video>
        <p id="localTitle"> </p>
        <meter id="localVolume" class="volume" min="-45" max="-20" high="-25" low="-40"></meter>
     </div>
     <div id="localScreenContainer" class="videoContainer">
     </div>
     <div id="remotes">
        <p id="remotoTitle"></p>
     </div>
     <hr>
    
     <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/jquery.js"></script>
     <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/adapter-4.js"></script>
     <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/latest-v3.js"></script>
     <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/webrtc.js"></script>

	
</div> <!-- #conteudo -->

<?php 

        
?>

<?php get_footer(); ?> <!-- Mostrar o rodape -->