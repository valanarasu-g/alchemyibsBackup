<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : Medixi
 * @version   : 1.0
 * @Author    : Vecuro
 * @Author URI: https://themeforest.net/user/vecuro_themes
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$medixi_layout = medixi_meta( 'custom_page_layout' );

if( $medixi_layout == '1' ){
	echo '<div class="medixi-main-wrapper">';
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}elseif( $medixi_layout == '2' ){
    echo '<div class="medixi-main-wrapper">';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}else{
	echo '<div class="medixi-fluid">';
}
	echo '<div class="builder-page-wrapper">';
	// Query
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			the_content();
		}
        wp_reset_postdata();
	}

	echo '</div>';
if( $medixi_layout == '1' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}elseif( $medixi_layout == '2' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}else{
	echo '</div>';
}

//footer
get_footer();