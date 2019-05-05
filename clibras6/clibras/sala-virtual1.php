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

      <video id="recorded"></video>  

    <div>
      <button id="record" class="button button-primary button-large" >Iniciar Gravação</button>
      <!-- <button id="play" class="button button-primary button-large"  >Play</button>-->
      <button id="download"  class="button button-primary button-large" >Download</button>
    </div>

    
    <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/jquery.js"></script>
    <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/adapter-4.js"></script>
    <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/latest-v3.js"></script>
    <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/webrtc.js"></script>
    <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/main.js"></script>
    <script src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/js/ga.js"></script>

	
</div> <!-- #conteudo -->

<?php 
    $conn = mysqli_connect("localhost","root","","clibras");

    // Check connection
    if (!$conn) {
        die("Conexao Falhou: " . mysqli_connect_error());
    }

    if(isset($_POST['download'])){
        echo "<script> alert('Download de Gravacao Solicitado');</script>";
        $conteudo = $_POST["conteudoInput"];
        $room = $_GET["room"];
        $verifica = mysqli_query($conn,"SELECT * FROM clibras_room WHERE identificacao_room='$room'");

        while($escrever=mysqli_fetch_array($verifica)){

            echo "<tr><td>" . "<a href=$escrever[link_room]>$escrever[titulo_conteudo]</a>" . "</td><td>" . $escrever['identificacao_room'] . "</td></tr>";

        }
    }

    /*
    if (mysqli_query($conn,"INSERT INTO clibras_room (titulo_conteudo, identificacao_room, criador_room, link_room) VALUES ('$conteudo','$room','P','$url')")){
            echo "<script> alert('Sala Virtual Criada com Sucesso!'); </script>";
        } else {
            echo "<script> alert('Erro durante a criação da sala virtual'); </script>";
        }
    }
    */
    mysqli_close($conn);


        
?>

<?php get_footer(); ?> <!-- Mostrar o rodape -->