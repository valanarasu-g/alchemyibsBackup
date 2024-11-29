<?php
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $medixi_post_id = get_the_ID();

            // Get the page settings manager
            $medixi_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $medixi_page_settings_model = $medixi_page_settings_manager->get_model( $medixi_post_id );

            // Retrieve the color we added before
            $medixi_header_style = $medixi_page_settings_model->get_settings( 'medilax_header_style' );
            $medixi_header_builder_option = $medixi_page_settings_model->get_settings( 'medilax_header_builder_option' );

            if( $medixi_header_style == 'header_builder'  ) {

                if( !empty( $medixi_header_builder_option ) ) {
                    $medixiheader = get_post( $medixi_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $medixiheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $medixi_header_builder_trigger = medixi_opt('medixi_header_options');
                if( $medixi_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $medixi_global_header_select = get_post( medixi_opt( 'medixi_header_select_options' ) );
                    $header_post = get_post( $medixi_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    medixi_global_header_option();
                }
            }
        } else {
            $medixi_header_options = medixi_opt('medixi_header_options');
            if( $medixi_header_options == '1' ) {
                medixi_global_header_option();
            } else {
                $medixi_header_select_options = medixi_opt('medixi_header_select_options');
                $medixiheader = get_post( $medixi_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $medixiheader->ID );
                echo '</header>';
            }
        }
    } else {
        medixi_global_header_option();
    }