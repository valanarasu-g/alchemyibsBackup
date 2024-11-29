<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme ecohost for publication on TemplateMonster
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */



/**
 * Include the TGM_Plugin_Activation class.
 */
require_once MEDIXI_DIR_PATH_FRAM . 'plugins-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'medixi_register_required_plugins' );
function medixi_register_required_plugins() {

    /*
    * Array of plugin arrays. Required keys are name and slug.
    * If the source is NOT from the .org repo, then source is also required.
    */

    $plugins = array(

        array(
            'name'                  => esc_html__( 'Medixi Core', 'medixi' ),
            'slug'                  => 'medixi-core',
            'version'               => '1.0',
            'source'                => MEDIXI_DIR_PATH_FRAM . 'plugins/medixi-core.zip',
            'required'              => true,
        ),

        array(
            'name'                  => esc_html__( 'LayerSlider', 'medixi' ),
            'slug'                  => 'LayerSlider',
            'version'               => '1.0',
            'source'                => MEDIXI_DIR_PATH_FRAM . 'plugins/LayerSlider.zip',
            'required'              => true,
        ),

        array(
            'name'                  => esc_html__( 'CMB2 Conditional Scripts', 'medixi' ),
            'slug'                  => 'cmb2-conditionals-master',
            'version'               => '1.0',
            'source'                => MEDIXI_DIR_PATH_FRAM . 'plugins/cmb2-conditionals-master.zip',
            'required'              => true,
        ),

        array(
            'name'                  => esc_html__( 'One Click Demo Importer', 'medixi' ),
            'slug'                  => 'one-click-demo-import',
            'required'              => true,
        ),

        array(
            'name'      => esc_html__( 'Elementor', 'medixi' ),
            'slug'      => 'elementor',
            'version'   => '',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'Redux Framework', 'medixi' ),
            'slug'      => 'redux-framework',
            'version'   => '',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'CMB2', 'medixi' ),
            'slug'      => 'cmb2',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'Contact Form 7', 'medixi' ),
            'slug'      => 'contact-form-7',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'Mailchimp', 'medixi' ),
            'slug'      => 'mailchimp-for-wp',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'GTranslate', 'medixi' ),
            'slug'      => 'gtranslate',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'WooCommerce', 'medixi' ),
            'slug'      => 'woocommerce',
            'version'   => '',
            'required'  => true,
        ),

        array(
            'name'      => esc_html__( 'TI WooCommerce Wishlist', 'medixi' ),
            'slug'      => 'ti-woocommerce-wishlist',
            'version'   => '',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'WPC Smart Quick View for WooCommerce', 'medixi' ),
            'slug'      => 'woo-smart-quick-view',
            'version'   => '',
            'required'  => true,
        ),

    );

    $config = array(
        'id'           => 'medixi',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}