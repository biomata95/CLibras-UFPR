<!doctype html>
 <html class="no-js"  <?php language_attributes(); ?>>
  <head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php bloginfo('name'); ?></title>
<!--
*********************************************************
*     CHAMADA AOS ARQUIVOS CSS DO ZURB FOUNDATION 6     *
*********************************************************
-->
    <link rel="stylesheet" type="text/css" rel="stylesheet" href="<?php bloginfo('template_url');?>/foundation-6/css/foundation.css" />

<!-- Favicon -->
    <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/images/icons/favicon.ico" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url');?>/foundation-6/css/app.css" />

<!-- Elegant Icons -->
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css" />

<!-- Alto contraste -->
	<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/contraste.css" title="contraste" disabled="disabled">

	<?php wp_head(); ?>
	
<!-- Piwik -->

<!-- 
		1) Criar conta no Piwik da UFPR; 
		2) Substituir este script abaixo pelo script gerado pelo Piwik;
		3) descomentar...
-->

<!-- Piwik -->

<!-- 

<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["setDomains", ["*.www.DOMINIO.ufpr.br/portal"]]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//stats.ufpr.br/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 14]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//stats.ufpr.br/piwik.php?idsite=14" style="border:0;" alt="" /></p></noscript>

-->

<!-- End Piwik Code -->

</head>

<body <?php body_class(); ?> > <!-- Chama as classes do wordpress de acordo com a página que será carregada -->

<!--
*********************************************************
*   BARRA DE IDENTIDADE DO GOVERNO FEDERAL NA INTERNET  *
*********************************************************
-->

<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;"> 
	<ul id="menu-barra-temp" style="list-style:none;">
		<li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
			<a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
		</li> 
		<li>
			<a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
		</li>
	</ul>
</div>

<!--
*********************************************************
*                BARRA DE ACESSIBILIDADE                *
*********************************************************
-->
  <div class="row" style="background-color: #fff;">
	    <div class="large-6 medium-6 columns show-for-medium">
	           <div id="menu_acessibilidade_left">
	               <ul>  
	                    <li><a accesskey="1" title="Ir para o conte&uacute;do" href="#conteudo-principal">Ir para o conte&uacute;do<span>1</span></a></li>  
	                    <li><a accesskey="2" title="Ir para o menu" href="#menu_principal">Ir para o menu<span>2</span></a></li>  
	                    <li><a accesskey="3" title="Ir para a busca" href="#s">Ir para a busca<span>3</span></a></li>
	                    <li><a accesskey="4" title="Ir para o rodap&eacute;" href="#rodape">Ir para o rodap&eacute;<span>4</span></a></li>  
	              </ul>  
	           </div> 
	    </div>
	    <div id="menu_acessibilidade_right" class="small-12 large-6 medium-6 columns show-for-small">
	        <ul>  
	            <li><a accesskey="5" href="<?php bloginfo('url'); ?>/acessibilidade/" title="Acessibilidade">ACESSIBILIDADE</a></li>  
           		<li><a accesskey="6" href="#" id="contrast" title="Alto Contraste">ALTO CONTRASTE</a></li>
	            <li><a accesskey="7" href="<?php bloginfo('url'); ?>/mapa-do-site/" title="Mapa do Site">MAPA DO SITE</a></li>
	        </ul>  
	   	</div>
	
	<hr style="margin:0; padding: 0; margin-bottom: 0.1em;">
  
  </div>
<!--
*********************************************************
*                         CABECALHO                     *
*     Imagem do Cabecalho definida no arquivo app.css   *
*       id "cabecalho" imagem de fundo "topo.png"       *
*********************************************************
-->

<div id="cabecalho" class="row">

	<div id="menu_superior" class="small-12 columns hide-for-small-only"><!-- Inicio div Cabeçalho large-12 do ZURB Foundation -->

<!--
**********************************************************
*           MENU SUPERIOR - BARRA COM LINKS UFPR         *
**********************************************************
-->
                <?php  if ( has_nav_menu( 'menu_superior' ) ) { // Verifica se existe um menu criado e assinalado para o cabeçalho (menu superior horizontal)
                            wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu_superior' ) ); // Se existe, então mostre...
                        } ?>

    </div> <!-- # 12 colunas - ZURB Foundation -->
               
<!--
**********************************************************
*           NOME DO SITE E CAIXA DE PESQUISA             *
**********************************************************
-->
	<div class="small-12 columns barra_pesquisa"><!-- Inicio div pesquisa large-12 do ZURB Foundation -->    	
           <div class="small-11 columns"><h3><?php bloginfo( 'name' ); ?></h3></div>
           <div class="large-1 medium-1 columns hide-for-small-only"> <?php get_search_form();?></div>
    </div>

</div>	<!-- Final do #cabecalho -->

<a name="menu" id="menu"></a> <!-- link direto acessibilidade para menu de navegacao -->
<!--
*********************************************************
*                MENU PRINCIPAL HORIZONTAL              *
*           Menu definida no arquivo app.css            *
*                     id "menu_principal"                       *
*********************************************************
-->
<div class="row">
	<div id="menu_principal" class="medium-12 hide-for-small-only"><!-- Inicio div Cabeçalho large-12 do ZURB Foundation -->
		<div class="medium-12"><!-- estilo para definir cor de fundo do menu -->
		            <?php  
			            if ( has_nav_menu( 'menu_principal' ) ) { // Verifica se existe um menu criado e assinalado para o cabeçalho (menu superior horizontal)
			            wp_nav_menu( array( 'menu_class' => 'dropdown menu extended', 'theme_location' => 'menu_principal', 'container_class' => 'menu-header', 'items_wrap' => '<ul class="%2$s show-for-medium" data-dropdown-menu>%3$s</ul>') ); // Se existe, então mostre...
			            }
		            ?>
	      
		</div> 
    </div><!-- # 12 colunas para o menu principal horizontal - ZURB Foundation -->

<!--
**********************************************************
*        MENU PRINCIPAL HORIZONTAL RESPONSIVO            *
*   O menu padrão assinalado é Menu Superior Horizontal  *
**********************************************************
-->
		<!-- Menu Superior Horizontal para Dispositivos Móveis -->
		<div class="small-12 show-for-small-only">
			<div class="title-bar" data-responsive-toggle="menu_responsivo" data-hide-for="medium">
              <button class="menu-icon" type="button" data-toggle></button>
              <div class="title-bar-title">Menu</div>
           </div>
           <div class="top-bar" id="menu_responsivo">
               <div class="top-bar-left">
                    <ul class="menu vertical" data-drilldown>
                        <?php  if ( has_nav_menu( 'menu_responsivo' ) ) { // Verifica se existe um menu criado e assinalado para o cabeçalho responsivo
                            wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'menu_responsivo' ) ); // Se existe, então mostre...
                        } ?>
                    </ul>
                </div>	
           </div>	
           <div id="pesquisa_responsivo">
               <?php get_search_form();?>
           </div>  
		</div> <!-- # 12 colunas do menu superior horizontal -->
    
</div>	<!-- Final do menu -->

<!--
*********************************************************
*              Inicio do Conteúdo principal             *
*********************************************************
-->
	<a name="conteudo-principal" id="conteudo-principal"></a> <!-- link direto acessibilidade  -->