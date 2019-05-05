<!--
*********************************************************
*                         LINKS                         *
*********************************************************
--> 
<a name="rodape_acessibilidade"></a> <!-- link direto acessibilidade  -->

<div id="rodape_ufpr" class="row hide-for-small-only">
    <div class="small-12 large-12 columns">
<!--
*********************************************************
*     Coluna contendo relação de links da 1. coluna     *
*********************************************************
-->	
        <div class="small-3 medium-3 large-3 columns">        
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('primeira_coluna') ) : ?>
            <?php endif; ?>
        </div>

<!--
*********************************************************
*     Coluna contendo relação de links da 2. coluna     *
*********************************************************
-->	
        <div class="small-3 medium-3 large-3 columns">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('segunda_coluna') ) : ?>
            <?php endif; ?>
        </div>

<!--
*********************************************************
*     Coluna contendo relação de links da 3. coluna     *
*********************************************************
-->	
        <div class="small-3 medium-3 large-3 columns">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('terceira_coluna') ) : ?>
            <?php endif; ?>
        </div>

<!--
*********************************************************
*     Coluna contendo relação de links da 4. coluna     *
*********************************************************
-->	
        <div class="small-3 medium-3 large-3 columns">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('quarta_coluna') ) : ?>
            <?php endif; ?>
        </div>
      </div>  <!-- fechamento de ZURB Foundation 12 colunas -->
</div>  <!-- fechamento #row colunas de links -->

<!--
*******************************
*     Rodapé da página        *
*******************************
--> 
    
    <div id="rodape" class="row">

<!--
*******************************
*        Redes Sociais        *
*******************************
--> 
    <div id="redes_sociais" class="medium-4 columns">
      <h3 class="hide-for-small-only">UFPR nas Redes Sociais</h3>
      <a href="http://www.facebook.com/UFPRoficial" alt="UFPR no Facebook" title="UFPR no Facebook" target="_blank">
          <i class="social_facebook"></i>
      </a>
      <a href="http://twitter.com/ufpr" alt="UFPR no Twitter" title="UFPR no Twitter" target="_blank">
          <i class="social_twitter"></i>
      </a>
      <a href="http://www.flickr.com/ufpr" target="_blank">
           <img class="flickr" alt="UFPR no Flickr" src="<?php bloginfo('template_directory'); ?>/images/flickr.svg">
      </a>
      <a href="http://www.ufpr.br/portalufpr/lista-de-feeds-da-ufpr" alt="RSS UFPR" title="RSS UFPR" target="_blank">
          <i class="social_rss"></i>
      </a>
      <a href="http://www.youtube.com/user/TVUFPR" alt="UFPR no Youtube" title="UFPR no Youtube" target="_blank">
          <i class="social_youtube"></i>
      </a>
      <a href="http://www.instagram.com/ufpr_oficial" alt="UFPR no Instagram" title="UFPR no Instagram" target="_blank">
          <i class="social_instagram"></i>
      </a>      
    </div>

<!--
*******************************
*  Endereco do Setor/Unidade  *
*******************************
--> 
    <div id="texto_rodape" class="medium-7 float-right text-right">
          <span style="font-size: 1.5em;">Universidade Federal do Paran&aacute;</span> <br>
          <span style="font-size: 1.1em;"><?php echo bloginfo('name'); ?></span> <br>
          <span style="font-size: 0.8em;">Rua _____________________ | Fone: (41) __________ <br> CEP _________ | Curitiba | PR | Brasil </span><br>
          <span><img src="<?php bloginfo('template_directory'); ?>/images/logo_ufpr_branca.svg" title="Logo da UFPR"></span>
    </div>

<!--
*******************************
*           Copyright         *
*******************************
--> 
        <div class="large-12 medium-12 columns" align="center">
            <span style="color:#696969; font-size:0.9em;"><br>&copy;<?php echo date('Y') . " - Universidade Federal do Paran&aacute;"?></span><br>
            <span style="color:#696969; font-size:0.8em;">Desenvolvido em Software Livre e hospedado pelo Centro de Computa&ccedil;&atilde;o Eletr&ocirc;nica da UFPR</span>
        </div>
  </div>

<!--
*********************************************************
*     CHAMADA AOS ARQUIVOS JS DO ZURB FOUNDATION 6      *
*********************************************************
-->
   <script src="<?php bloginfo('template_url');?>/foundation-6/js/vendor/jquery.js"></script>
    <script src="<?php bloginfo('template_url');?>/foundation-6/js/vendor/what-input.min.js"></script>

    <script src="<?php bloginfo('template_url');?>/foundation-6/js/vendor/foundation.js"></script>
    <script src="<?php bloginfo('template_url');?>/foundation-6/js/app.js"></script>

<!-- PGWSlideShow -->
    <script src="<?php bloginfo('template_url');?>//foundation-6/js/vendor/lightslider.js"></script>

<!-- Alto contraste -->
    <script src="<?php bloginfo('template_url');?>/js/altocontraste.js" type="text/javascript"></script>  
    <script src="<?php bloginfo('template_url');?>/js/jquery.cookie.js" type="text/javascript"></script>  
<!--
*********************************************************
*               CARREGA A BARRA DO GOVERNO              *
*********************************************************
-->
    <script defer="defer" async="async" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
  
    <div id="footer-brasil"></div>    

<!-- Inicializa o Foundation -->
<script>
  $(document).foundation();
</script>

<!-- Alto contraste -->
<script type="text/javascript">
    $(document).ready(function(){
        if (($.cookie('highContrast') === "true")) {
                     setActiveStyleSheet('contraste');
                     $("body").addClass("contraste");  
                     $.cookie('highContrast', 'true', { path: '/' });          
        }
        
        jQuery("#contrast").click(function() {  
               if (($.cookie('highContrast') === "true")) {
                     setActiveStyleSheet('default');
                     $("body").removeClass("contraste");
                     $.cookie('highContrast', 'false', { path: '/' }); 
                } else {
                     setActiveStyleSheet('contraste');
                     $("body").addClass("contraste");  
                     $.cookie('highContrast', 'true', { path: '/' });          
                 }
            });     

$("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
          });
</script>
  <?php wp_footer(); ?>
 
 
  </body>
</html>