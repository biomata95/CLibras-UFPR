<?php
/*
Template Name: Listar-Salas
*/
?>
<!-- Início conteúdo principal da página usando ZURB CSS -->

<?php get_header(); ?> <!-- Mostrar o cabecalho -->


<?php 
 
    $conn = mysqli_connect("localhost","root","","clibras");
    if (!$conn) {
        die("Conexao Falhou: " . mysqli_connect_error());
    }
    $verifica = mysqli_query($conn,"SELECT * FROM clibras_room");
        
?>


<div id="conteudo" class="row fundo_branco">

<!--
*********************************************************
*                   Conteúdo principal                  *
*********************************************************
-->	

	<div id="noticia" class="small-12 medium-12 large-12 columns centered">
	<?php

        echo "<h2>Salas Virtuais </h2>";

        echo "<table border='1'>
          <tr><td>Titulo</td><td>Room</td><td>Link</td></tr>";

    
        while($escrever=mysqli_fetch_array($verifica)){

            echo "<tr><td>" . $escrever['titulo_conteudo'] . "</td><td>" . $escrever['identificacao_room'] . "</td><td>". $escrever['link_room'] . "</td></tr>";

        }

        echo "</table>"; /*fecha a tabela apos termino de impressão das linhas*/
        

	?>
    </div> <!-- #row -->

	
</div> <!-- #conteudo -->


<?php get_footer(); ?> <!-- Mostrar o rodape -->