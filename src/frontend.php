<?php

namespace Mosaika\Rewrite_Rules\Frontend;

use function Mosaika\Rewrite_Rules\Utils\is_dashboard_page;
use function Mosaika\Rewrite_Rules\Utils\get_dashboard_url;

defined( 'ABSPATH' ) || exit;

//=====================================
//                                     
//  ##   ##  #####    ##       ####  
//  ##   ##  ##  ##   ##      ##     
//  ##   ##  #####    ##       ###   
//  ##   ##  ##  ##   ##         ##  
//   #####   ##   ##  ######  ####   
//                                     
//=====================================

/**
 * Enregistrement des nouvelles routes que l'on souhaite ajouter.
 *
 * @return void
 */
function register_new_rules() {
	add_rewrite_tag( '%dashboard%', '([^&]+)' );
	add_rewrite_tag( '%dashboard_page%', '([^&]+)' );
	add_rewrite_rule( 'dashboard/([a-z0-9-]+)[/]?$', 'index.php?dashboard=1&dashboard_page=$matches[1]', 'top' );
}
add_action( 'init', __NAMESPACE__ . '\\register_new_rules', 10, 1 );

/**
 * Chargement d'un template PHP spécifique si l'on visite des pages /dashboard/.
 *
 * @param string $template
 * @return string
 */
function load_custom_template_on_dashboard_page( $template ) {
	if ( is_dashboard_page() ) {
		return sprintf( '%1$s%2$stemplates%2$sdashboard.php', untrailingslashit( MSK_REWRITE_DIR ), DIRECTORY_SEPARATOR );
	}

	return $template;
}
add_filter( 'template_include', __NAMESPACE__ . '\\load_custom_template_on_dashboard_page' );

/**
 * Redirection des utilisateurs non-connectés vers la page d'accueil.
 *
 * @return void
 */
function redirect_non_logged_in_users() {
	if ( is_dashboard_page() && ! is_user_logged_in() ) {
		wp_safe_redirect( wp_login_url( get_dashboard_url() ) );
		exit();
	}
}
add_action( 'template_redirect', __NAMESPACE__ . '\\redirect_non_logged_in_users', 10, 1 );

//=================================================================
//                                                                 
//   ####   #####   ##     ##  ######  #####  ##     ##  ######  
//  ##     ##   ##  ####   ##    ##    ##     ####   ##    ##    
//  ##     ##   ##  ##  ## ##    ##    #####  ##  ## ##    ##    
//  ##     ##   ##  ##    ###    ##    ##     ##    ###    ##    
//   ####   #####   ##     ##    ##    #####  ##     ##    ##    
//                                                                 
//=================================================================

/**
 * Ajout d'un faux contenu de test sur l'onglet Home.
 *
 * @return void
 */
function add_fake_content_to_home_tab() {
	echo 'Contenu de l\'onglet "Accueil"';
}
add_action( 'msk/tab-content/home', __NAMESPACE__ . '\\add_fake_content_to_home_tab', 10, 1 );

/**
 * Ajout d'un faux contenu de test sur l'onglet Orders.
 *
 * @return void
 */
function add_fake_content_to_orders_tab() {
	echo 'Contenu de l\'onglet "Commande"';
}
add_action( 'msk/tab-content/orders', __NAMESPACE__ . '\\add_fake_content_to_orders_tab', 10, 1 );

/**
 * Ajout d'un faux contenu de test sur l'onglet Support.
 *
 * @return void
 */
function add_fake_content_to_support_tab() {
	echo 'Contenu de l\'onglet "SàV"';
}
add_action( 'msk/tab-content/support', __NAMESPACE__ . '\\add_fake_content_to_support_tab', 10, 1 );

/**
 * Ajout d'un faux contenu de test sur l'onglet Account.
 *
 * @return void
 */
function add_fake_content_to_account_tab() {
	echo 'Contenu de l\'onglet "Mon compte"';
}
add_action( 'msk/tab-content/account', __NAMESPACE__ . '\\add_fake_content_to_account_tab', 10, 1 );
