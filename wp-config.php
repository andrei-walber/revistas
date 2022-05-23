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
define( 'DB_NAME', 'revistas' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'andreiwalber' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'Abw110197!@#' );

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
define( 'AUTH_KEY',         ';X|?;3L4b!Y!*mWE(*_HA@ YC#2,KB4HO`X{Tk.6V)BQ0t^*L`/J3!KwM0dWxG[l' );
define( 'SECURE_AUTH_KEY',  'CY00nA7#G!|htALz Wl;EeaEPo!pKLxbe>(5[7+AHGIX[,N.jIhM9%t<6@xmkM9<' );
define( 'LOGGED_IN_KEY',    '!fN3cKhi:vQw_/_Q]<^aVuWp9h=z|q`oV;wWg]F2[c%<:Mv}kQIHAU,+tqvhjw]Z' );
define( 'NONCE_KEY',        ']UP(}.J@ v]ZrQ3;<,i|v4?6Jh+}KMOsQ%!1>iZP,7-qB77n(jGjCIjzuf?;`oDe' );
define( 'AUTH_SALT',        'hxwqG51|Uf|c{ }vfCN|bX{!Vph5:)XIu:nX[%=:MbzgGAojurqZJ@]n_BT<@*pE' );
define( 'SECURE_AUTH_SALT', 'VD[a1nxI+ORHuv(J&GUac-E4%#u[i-,5(o!F3UAUk_znhT(0$hX%7ya9Y7)85%HQ' );
define( 'LOGGED_IN_SALT',   'GDwhiQXn~c^~V[$!;OaDGv)&poB#;/:`qbNE3}c)r=yeki+aS6GSx;Q0X;y3W{B,' );
define( 'NONCE_SALT',       'BYsho*p]``t!vnqOvwt f~s=|_D($0%=E=Ww`>Rf}M@S-L^-mQ;o)lU#/b2LEsxE' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'rv_';

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

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
