<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Medixi
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// enqueue css
function medixi_common_custom_css(){
	wp_enqueue_style( 'medixi-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = medixi_opt( 'medixi_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";

    if( get_header_image() ){
        $medixi_header_bg =  get_header_image();
    }else{
        if( medixi_meta( 'page_breadcrumb_settings' ) == 'page' && is_page() ){
            if( ! empty( medixi_meta( 'breadcumb_image' ) ) ){
                $medixi_header_bg = medixi_meta( 'breadcumb_image' );
            }
        }
    }

    if( !empty( $medixi_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$medixi_header_bg}')!important;
        }";
    }

	// theme color
	$medixithemecolor  = medixi_opt('medixi_theme_color');
	$medixisecondcolor = medixi_opt('medixi_secondary_color');

	if( !empty( $medixithemecolor ) ) {
		$customcss .= ":root {
		  --theme-color: {$medixithemecolor};
		}";
	}

	if( !empty( $medixisecondcolor ) ) {
		$customcss .= ":root {
			--title-color: {$medixisecondcolor};
		}";
	}


	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'medixi-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'medixi_common_custom_css', 100 );