<?php
/*
Template Name: Pagina-Principal
*/
?>
<!-- Início conteúdo principal da página usando ZURB CSS -->

<?php get_header(); ?> <!-- Mostrar o cabecalho -->

<div id="conteudo" class="row fundo_branco">

<!--
*********************************************************
*                   Conteúdo principal                  *
*********************************************************
--> 

    <div id="noticia" class="small-12 medium-12 large-12 columns centered">



         </div> <!-- #row -->
         <form name="escolhaform" id="escolhaform" method="post">
                <h2>Pagina Principal</h2>
                <input type="button" onclick="window.location='salas-virtuais'" class="button button-primary button-large" value="Visualizar Salas Virtuais"/>
                <br>
                <input type="button" onclick="window.location='gravacoes'" class="button button-primary button-large" value="Visualizar Gravacoes"/>
                <br>
                <input type="button" onclick="window.location='criar-sala'" class="button button-primary button-large" value="Criar Sala Virtual"/>          
                      
        </form>

    
</div> <!-- #conteudo -->


<?php get_footer(); ?>

</html>


<?php 

switch (get_post_action('salas', 'criacao-sala')) {
    case 'salas':
        header("location:salas-virtuais");
        break;

    case 'criacao-sala':
        header("location:criar-sala");
        break;

    default:
        //no action sent
}
        
?>