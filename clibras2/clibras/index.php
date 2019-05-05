<!-- Carrega o arquivo header.php -->
<?php get_header(); ?>

<!-- Início conteúdo principal da página usando ZURB CSS -->
<html>
<link rel='stylesheet' href='http://localhost/wpwebrtc/wp-admin/load-styles.php?c=1&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp;ver=4.9.6' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="http://localhost/wpwebrtc/wp-content/themes/clibras/custom-login/custom-login.css" /><meta name='robots' content='noindex,follow' />
<div id="conteudo" class="row fundo_branco">

<style>

    #user_pass{
        width:40%;
    }

    #user_login{
        width:40%;
    }

</style>


<form name="loginform" id="loginform" action="index.php" method="POST">
    <div align="center" id="ufpr-logo">
        <img src="http://200.17.210.85/wpwebrtc/wp-content/themes/clibras/images/UFPR-logo.jpg">
        <br>
        <br>

        <div style=" width:50%; color: navy; background-color:#D0D0D0;" align="center" >
            <p>
                <label for="user_login">Nome de usu&aacuterio ou endere&ccedilo de e-mail </label><br/>
                <input type="text" name="log" id="user_login" value="" />
            </p>
            <p>
                <label for="user_pass">Senha</label><br>
                <input type="password" name="pwd" id="user_pass" class="input" value="" />
            </p>
            <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value=""  /> Lembrar-me</label></p>
            <p align="center">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Acessar" />
                <input type="hidden" name="testcookie" value="1" />
            </p>
        </div>
    </div>
</form>

<?php get_footer(); ?>

</html>



<?php 
    if (array_key_exists("wp-submit", $_POST)){
        echo "existe";
    }
    else{
        echo "nao existe";
    }
    $login = $_POST["user"];
    $senha = $_POST["pwd"];
    $entrar = $_POST["wp-submit"];
    $servername = "localhost";
    $database = "clibras";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect("localhost","root","","clibras");
    // Check connection
    if (!$conn) {
        die("Conexao Falhou: " . mysqli_connect_error());
    }
    echo "Conexao realizada com sucesso";
    if (isset($entrar)) {
        $verifica = mysqli_query($conn,"SELECT * FROM clibras_usuarios WHERE clibras_login='$login' AND clibras_password='$senha'");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
          die();
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Login efetuado com sucesso');window.location.href='pagina-principal';</script>";  
        }
    }

    mysqli_close($conn);
        
?>



