<?php

/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

// Cmb 2 Admin Script
add_action( 'admin_enqueue_scripts', 'educino_cmb2_admin_scripts' );
function educino_cmb2_admin_scripts( $screen ){

    if( get_current_screen()->post_type == 'page' ) {
        wp_enqueue_script( 'page-metafieldconditional-script', plugins_url( 'js/page.metafieldconditional.js', __FILE__ ) , array('jquery'), '1.0', true );
    }
    
}