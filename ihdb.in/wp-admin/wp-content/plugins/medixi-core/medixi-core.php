<?php

/**

 * Plugin Name: Medixi Core
 * Description: This is a helper plugin of medilax theme
 * Version:     1.1.5
 * Author:      Vecurosoft
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: medilax
 */



 // Blocking direct access

if( ! defined( 'ABSPATH' ) ) {

    exit();

}



// Define Constant

define( 'MEDILAX_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MEDILAX_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'MEDILAX_PLUGIN_CMB2_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );
define( 'MEDILAX_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );
define( 'MEDILAX_PLUGDIRURI', plugin_dir_url( __FILE__ ) );
define( 'MEDILAX_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );
define( 'MEDILAX_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'medilax-template/' );

// load textdomain
load_plugin_textdomain( 'medilax', false, basename( dirname( __FILE__ ) ) . '/languages' );

//include file.

require_once MEDILAX_PLUGIN_INC_PATH .'medilaxcore-functions.php';
require_once MEDILAX_PLUGIN_INC_PATH .'builder/builder.php';
require_once MEDILAX_PLUGIN_INC_PATH . 'icons.php';

require_once MEDILAX_PLUGIN_CMB2_PATH . 'cmb2ext-init.php';
//Widget

require_once MEDILAX_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'contact-info-widget.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'gallery-widget.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'about-me-widget.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'download-button.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'product-tag-filter.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'product-category-filter.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'contact-form.php';
require_once MEDILAX_PLUGIN_WIDGET_PATH . 'medixi-social-icon.php';



//addons

require_once MEDILAX_ADDONS . 'addons.php';