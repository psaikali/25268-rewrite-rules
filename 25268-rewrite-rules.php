<?php
/**
 * Plugin Name: Mosaika — Créer ses propres URLs dynamiques dans WordPress
 * Description: Exemple de code accompagnant l'article de blog parlant des Rewrite Rules dans WordPress.
 * Author: Pierre Saïkali
 * Author URI: https://mosaika.fr/rewrite-urls-dynamiques-wordpress/
 * Version: 1.0.0
 */

namespace Mosaika\Rewrite_Rules;

defined( 'ABSPATH' ) || exit;

define( 'MSK_REWRITE_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Chargement des fichiers vitaux de cette extension.
 *
 * @return void
 */
function require_files() {
	require_once MSK_REWRITE_DIR . '/src/frontend.php';
	require_once MSK_REWRITE_DIR . '/src/utils.php';
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\\require_files' );
