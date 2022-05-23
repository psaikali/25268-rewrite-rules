<?php

use function Mosaika\Rewrite_Rules\Utils\get_active_dashboard_tab;
use function Mosaika\Rewrite_Rules\Utils\get_dashboard_tabs;
use function Mosaika\Rewrite_Rules\Utils\get_dashboard_url;
use function Mosaika\Rewrite_Rules\Utils\is_current_dashboard_tab;

defined( 'ABSPATH' ) || exit;

$current_dashboard_page = get_active_dashboard_tab();

get_header(); ?>

<header class="page-header alignwide">
	<h1 class="page-title"><?php _e( 'Tableau de bord', 'msk' ); ?></h1>
</header><!-- .page-header -->

<section class="tab-container" style="display: flex; flex-direction: row;">
	<ul class="tabs" style="flex: 1;">
		<?php foreach ( get_dashboard_tabs() as $slug => $title ) {
			printf(
				'<li class="tab-%2$s %3$s"><a href="%1$s">%2$s</a></li>',
				esc_url( get_dashboard_url( $slug ) ),
				$title,
				sanitize_html_class( $slug ),
				is_current_dashboard_tab( $slug ) ? 'active' : ''
			);
		} ?>
	</ul>

	<div class="tab-content" style="flex: 4;">
		<?php do_action( "msk/tab-content/{$current_dashboard_page}" ); ?>
	</div>
</section>

<?php get_footer(); ?>
