<?php
/**
 * Plugin Name: Cronos Presale Counter
 * Plugin URI:  https://www.rubixstudios.com.au
 * Description: Displays a presale counter using Elementor
 * Author:      Rubix Studios
 * Author URI:  https://www.rubixstudios.com.au/
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires at least: 4.9
 * Requires PHP: 5.2.4
 * Version:     1.0.1
 * Elementor tested up to: 3.21.0
 * Elementor Pro tested up to: 3.21.0
 * Text Domain: cronos-presale-counter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function register_cronos_widget( $widgets_manager ) {
    require_once plugin_dir_path(__FILE__). 'includes/widget.php';
	$widgets_manager->register( new Presale_Counter_Widget() );
}
add_action( 'elementor/widgets/register', 'register_cronos_widget' );

function cronos_widget_check_elementor_pro_is_active() {
	if ( !is_plugin_active( 'elementor-pro/elementor-pro.php' ) ) {
		echo "<div class='error'><p><strong>Cronos Presale Counter</strong> requires <strong>Elementor Pro</strong> plugin to be installed and activated.</p></div>";
	}
}

add_action( 'admin_notices', 'cronos_widget_check_elementor_pro_is_active' );