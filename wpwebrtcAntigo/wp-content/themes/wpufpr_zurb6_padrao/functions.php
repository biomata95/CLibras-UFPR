<?php

/***************************************************/
/*     Customização da área de administração        */
/*  			    TELA DE LOGIN                   */
/****************************************************/

function custom_login() { 
echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/custom-login/custom-login.css" />'; 
}
add_action('login_head', 'custom_login');


// Muda o logotipo na tela de login do painel administrativo
 
function cutom_login_logo() {
		echo "<style type=\"text/css\">
		body.login div#login h1 a {
		background-image: url(".get_bloginfo('template_directory')."/images/logo-login.svg);
		-webkit-background-size: auto;
		background-size: 320px 209px;
		margin: 0;
		width: 320px;
		height: 209px;
}
</style>";
}
add_action( 'login_enqueue_scripts', 'cutom_login_logo' );



/***************************************************************/
/*   Customização da IMAGEM do cabeçalho com altura flexível   */
/***************************************************************/
	add_theme_support( 'custom-header', array(
	  // Imagem padrão
	  'default-image' => get_template_directory_uri() . '/images/banner_ufpr.jpg',
      // Altura da imagem flexível
      'flex-height' => true,
      // Altura recomendada 250px
       'height' => 232,
      // Largura da imagem não é flexível
      'flex-width' => true,
	  // Não esquecer de alterar também a largura da página no Zurb Foundation...
      'width' => 1200
	) );

/****************************************************/
/*        Adiciona suporte a imagem destacada       */
/*                 Post-thumbnails                  */
/****************************************************/
		add_theme_support( 'post-thumbnails' ); 

/****************************************************/
/*      Customização da COR DE FUNDO da página      */
/****************************************************/
	add_theme_support('custom-background');

/****************************************************/
/*           Adiciona  menus personalizados         */
/*            Este tema usa wp_nav_menu()           */
/****************************************************/
	register_nav_menus(
		array(
			'menu_principal' 	=> __( 'Menu Principal Horizontal', 'foundation' ),
            'menu_responsivo' 	=> __('Menu Responsivo', 'foundation'),
			'menu_superior'		=> __( 'Menu Superior', 'foundation' ),
			'mapa_do_site'		=> __('Mapa do Site', 'foundation' )
		)
	);

/****************************************************/
/*				Adiciona links RSS ao <head>        */
/****************************************************/
	add_theme_support( 'automatic-feed-links' );
	

/****************************************************/
/*		Registra áreas de Widget                    */
/****************************************************/

function theme_widgets_init() {

/****************************************************/
/*		Registra Sidebar Esquerda                   */
/****************************************************/
register_sidebar( array (
		'name' => 'Barra lateral esquerda',
		'id' => 'esquerda',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3>',
		'after_title' => '</h3>',
) );

/****************************************************/
/*             Registra Sidebar direita             */
/****************************************************/
register_sidebar(array(
			'name' => 'Sidebar direita',
			'id' => 'sidebar_direita',
			'before_widget' => '<div class="sidebar">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="entry-headline"><span class="entry-headline-text">',
			'after_title' => '</span></h2>'
    ));

/****************************************************/
/*        Registra a Primeira Coluna de Links       */
/****************************************************/
register_sidebar(array(
			'name' => 'Primeira Coluna de Links',
			'id' => 'primeira_coluna',
			'before_widget' => '<div class="colunas_de_links">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
    ));

/****************************************************/
/*        Registra a Segunda Coluna de Links        */
/****************************************************/
register_sidebar(array(
			'name' => 'Segunda Coluna de Links',
			'id' => 'segunda_coluna',
			'before_widget' => '<div class="colunas_de_links">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
    ));

/****************************************************/
/*        Registra a Terceira Coluna de Links       */
/****************************************************/
register_sidebar(array(
			'name' => 'Terceira Coluna de Links',
			'id' => 'terceira_coluna',
			'before_widget' => '<div class="colunas_de_links">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
    ));
	
/****************************************************/
/*          Registra a Quarta Coluna de Links       */
/****************************************************/
register_sidebar(array(
			'name' => 'Quarta Coluna de Links',
			'id' => 'quarta_coluna',
			'before_widget' => '<div class="colunas_de_links">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
    ));

} // fim de theme_widgets_init
add_action( 'init', 'theme_widgets_init');

 function my_remove_menu_elements()
    {
        remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
    }
    add_action('admin_init', 'my_remove_menu_elements');


// Remove acentos e espaços dos arquivos no upload
function custom_sanitize_file_name ( $filename ) {
	$filename = remove_accents( $filename );
	$filename = strtolower( $filename );
	$file_parts = pathinfo( $filename );
	return sanitize_title( $file_parts['filename'] ) . '.' . $file_parts['extension'];
}
add_filter( 'sanitize_file_name', 'custom_sanitize_file_name' );

function create_posttype() {
 
    register_post_type( 'noticias',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Noticias' ),
                'singular_name' => __( 'Noticia' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'noticias'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
?>