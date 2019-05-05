<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wpwebrtc');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '87881413');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ')?n<x)K_JGD%q!_f3=`I_~}ht&6Hx^4G7+Z6(t!I,Z)H1NuGFqhVO9:2Mr@+)RaE');
define('SECURE_AUTH_KEY',  'h$}39hA7H0&hibqPK/@F7y|n-;&^,kj6]LH{agtTv!8_1wgZG9>s>eyYj[#O?iE1');
define('LOGGED_IN_KEY',    'a&h?v[/h~C202DX4v5,9G>=Z]U-b] Q*&bYV%$JxyOg)u|+-2%1ELW=B=]^lpgk<');
define('NONCE_KEY',        'i,.]SW1s,Pu+ni-n<e!|=pILeyl)tp|tI(5I]1* gpD(K`-Keh2p,t4VR0^-M[VP');
define('AUTH_SALT',        'S?8btPSOn4,|VY5z;ZVs~PXt)Nwf[.;J^+09%]gwu=@$7ZEOhTC;j[,*_RMtdU}y');
define('SECURE_AUTH_SALT', '5:zhy|~`W`y$h3]S1,P&i3_B+7N]ekH1[k*yxKrVGIE@SG4lu@W[h(o=__AJ:1G,');
define('LOGGED_IN_SALT',   'e5p%Qs{_~D@E.3Oq9tx=p!+Pw[Z##fAwbzH$FQ+~{XjuyQd:B%*F3&`{48OH;Y6?');
define('NONCE_SALT',       '^~3Gww,Y?Xlz 6KdSJnX$QCiH;^q}~JU8$%i15DvhX1`LdAS>/A8XojkR D&$IDM');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
