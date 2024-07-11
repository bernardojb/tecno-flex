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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'tflx_tflx_wp' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'tflx_tflx_wpus' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '9x;k.;X&waAb' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'OzwK@<dZb-0VH>`Y*-v%&Z`rQJ|jkQqkTKZf7 :{}l[hnVEeLH)%M!HQ&YBE/co.' );
define( 'SECURE_AUTH_KEY',  '*_r:4Vt~#qBh{NZN{^|l`y}NJ&RAD}5 2o_my9`AYwM{FFxeH[)3AdG By@08+~v' );
define( 'LOGGED_IN_KEY',    '_jj?X*t%(to(65amfRw4sRq@Xn?X<2Qw]jNxkM2Z@ESfdbl`m<nG(K/7/Vynv=.e' );
define( 'NONCE_KEY',        'u^vTj2V<s35)n?G#6%ri`qV{{mc}CZ= ag%2+6WM)i`zro}G}u5]=T!x)wlm5h2V' );
define( 'AUTH_SALT',        '~[nkkmiP-I%yELdu>Bja,mU,P-=5J-bFPTDlg=BNhy,TX@bSTTCM%-h5Zk3<4hvO' );
define( 'SECURE_AUTH_SALT', ')M#<=_|X`,RXg>bkYBsT8KDr1EcY:q>GT_RSe{j0F<dBp>sq1~*lLZ<h#&>,3ukh' );
define( 'LOGGED_IN_SALT',   '@HD|Yb+-SA-Ehc$Rir?w*C!>ctv96,Hcb$Y%ECLXd^$!^m6Z#^IHPM7D7^n{@|yi' );
define( 'NONCE_SALT',       'QbPi}z:>e/?|;WqW$s-n/1g.r5Qeb0jP3bwT|&}E0Pv(Yk2a3r(Gv[%U<{e/41W1' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
