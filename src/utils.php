<?php

namespace Mosaika\Rewrite_Rules\Utils;

defined( 'ABSPATH' ) || exit;

/**
 * Fonction pour récupérer la liste des onglets avec leur slug et leur nom.
 *
 * @return array
 */
function get_dashboard_tabs() {
	$tabs = [
		'home'    => __( 'Tableau de bord', 'msk' ),
		'orders'  => __( 'Commandes', 'msk' ),
		'support' => __( 'Service après-vente', 'msk' ),
		'account' => __( 'Mon compte', 'msk' ),
	];

	return apply_filters( 'msk/tabs', $tabs );
}

/**
 * Renvoie l'URL d'un onglet spécifique de tableau de bord.
 *
 * @param string $tab
 * @return string
 */
function get_dashboard_url( $tab = 'home' ) {
	return home_url( "dashboard/{$tab}" );
}

/**
 * Renvoie le slug de la page de tableau de bord actuellement visitée.
 *
 * @return string|null
 */
function get_active_dashboard_tab() {
	$slug = get_query_var( 'dashboard_page' );
	return ! empty( $slug ) ? $slug : null;
}

/**
 * Vérification si la page actuellement visitée est une page du Tableau de bord.
 *
 * @return boolean
 */
function is_dashboard_page() {
	return (int) get_query_var( 'dashboard' ) === 1 && ! empty( get_query_var( 'dashboard_page' ) );
}

/**
 * Vérifie si un onglet spécifique correspond à la page actuellement visitée.
 *
 * @param string $tab
 * @return boolean
 */
function is_current_dashboard_tab( $tab = '' ) {
	return $tab === get_active_dashboard_tab();
}
